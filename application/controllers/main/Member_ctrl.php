<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    ob_start();
    class Member_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('form_validation');
            $this->load->library('upload');
            $this->load->library('image_lib');
            
            // Load model
            $this->load->model('address/Province');
            $this->load->model('address/District');
            $this->load->model('address/Sub_district');
            
            // Do filter
            
        }
        
        function member_detail_page(){
            /*
             *  Display edit member page
             *
             *  
             */
            
            // Check is sign in
            $this->gnc_authen->redirect_if_not_sign_in();
            
            // Get member id
            $member_id = $this->session->userdata('member_id');
            
            // Get member
            $member = $this->Member->get_member_by_id($member_id);
            
            // Member must not null
            if($member == null){
                redirect($this->lang->line('main'));
                return;
            }
            
            // Load neccessary data
            // Load provinces
            $province_arr = $this->Province->get_filter('*', null, null, 'province_name ASC', null, null);
            
            // Set data
            $data_assoc = array();
            $data_assoc['member'] = $member;
            $data_assoc['province_arr'] = $province_arr;
            
            // Load view
            $this->load->view('main/userDetail', $data_assoc);
            ob_flush();
        }
        
        function edit_member_pro(){
            /*
             *  Edit member data
             *
             */
            
            // Set validate rules
            $this->form_validation->set_rules('firstname', 'firstname', 'required|trim');
            $this->form_validation->set_rules('lastname', 'lastname', 'required');
            $this->form_validation->set_rules('address', 'address');
            $this->form_validation->set_rules('province', 'province');
            $this->form_validation->set_rules('district', 'district');
            $this->form_validation->set_rules('sub_district', 'sub_district');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            if(!$this->session->userdata('facebook_sign_in')){
                $this->form_validation->set_rules('new_password', 'new_password', 'regex_match[/[a-zA-Z0-9!@#$%&.,:*\-\]\[\/]/]|min_length[8]');
                $this->form_validation->set_rules('re_new_password', 're_new_password', 'regex_match[/[a-zA-Z0-9!@#$%&.,:*\-\]\[\/]/]|min_length[8]');
                $this->form_validation->set_rules('password', 'password', 'required|regex_match[/[a-zA-Z0-9!@#$%&.,:*\-\]\[\/]/]|min_length[8]');
            }
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                //echo validation_errors();
                echo '{"error": "ข้อมูลไม่ถูกต้อง"}';
                return;
            }
            
            // Check member password
            if(!$this->session->userdata('facebook_sign_in')){
                $member = $this->Member->member_authentication($this->session->userdata('member_email'), $this->input->post('password'));
                if(!$member){
                    echo '{"error": "รหัสผ่านไม่ถูกต้อง"}';
                    return;
                }
            }
            
            // Get input value
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $address = $this->input->post('address');
            $province = $this->input->post('province');
            $district = $this->input->post('district');
            $sub_district = $this->input->post('sub_district');
            $email = $this->input->post('email');
            $new_password = $this->input->post('new_password');
            $re_new_password = $this->input->post('re_new_password');
            
            // Prepare image value;
            $profile_image_full_path = NULL;
            $profile_image_field = 'member_image';
            
            if(array_key_exists($profile_image_field, $_FILES)){
                
                // Load library
                $this->load->library('upload');
                $this->load->library('image_lib');
                $this->load->library('GNC_image');
                
                $profile_image = $_FILES[$profile_image_field];
                
                // Get file type
                $profile_image_ext = pathinfo($profile_image['name'], PATHINFO_EXTENSION);
                $profile_image_type = $profile_image['type'];
                
                // Check file type
                if(!$this->gnc_image->is_image_file($profile_image)){
                    echo 'Invalid file';
                    return;
                }
                
                // Generate file name
                $profile_image_name = $this->gnc_image->generate_file_name('mm_').'.'.$profile_image_ext;
                $profile_image_location = MEMBER_IMAGE_PATH.'profile_imgs';
                
                // Set upload image config
                $config = array();
                $config['upload_path'] = $profile_image_location;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = true;
                $config['max_size']	= '20000';
                $config['max_width']  = '3850';
                $config['max_height']  = '3850';
                $config['file_name'] = $profile_image_name;
                $config['overwrite'] = TRUE;
                $fieldname = $profile_image_field;  //input tag name
                
                // If has old image, then remove it
                if($member['member_img_path']){
                    $old_path = $member['member_img_path'];
                    $old_full_path = getcwd().'/'.$old_path;
                    if(file_exists($old_full_path)){
                        unlink($old_full_path);
                    }
                }
                
                // Upload image profile
                $this->upload->initialize($config);
                if(!$this->upload->do_upload($fieldname)){
                    echo 'Upload error'.$this->upload->display_errors();
                    return;
                }else{
                    // Set path value
                    $profile_image_full_path = $profile_image_location.'/'.$profile_image_name;
                }
                
                // Get upload data
                $ud = $this->upload->data();
                
                // Resize image
                $resize_config = array();
                $resize_config['image_library'] = 'gd2';
                $resize_config['source_image'] = $ud['full_path'];
                $resize_config['create_thumb'] = FALSE;
                $resize_config['maintain_ratio'] = TRUE;
                $resize_config['width']  = 250;
                $resize_config['height']  = 250;
                $this->image_lib->initialize($resize_config);
                $this->image_lib->resize();
                
                //$image_content = file_get_contents($_FILES['member_image']['tmp_name']);
                //echo strlen(base64_encode($image_content));
                
            }
            
            // Prepare member data
            $member_data = array();
            $member_data['member_firstname'] = $firstname;
            $member_data['member_lastname'] = $lastname;
            $member_data['member_address'] = $address;
            $member_data['member_province'] = $province;
            $member_data['member_district'] = $district;
            $member_data['member_sub_district'] = $sub_district;
            if($profile_image_full_path){
                $member_data['member_img_path'] = $profile_image_full_path;
            }
            if($new_password){
                if($new_password != $re_new_password){
                    echo '{"error":"รหัสผ่านใหม่ไม่ตรง"}';
                    return;
                }
                // Encrypt password
                $hash_password = $this->Member->hash_new_password($new_password);
                $member_data['member_password'] = $hash_password;
            }
            
            // Update member
            $where_assoc = array();
            $where_assoc['member_id'] = $this->session->userdata('member_id');
            $update_result = $this->Member->update($where_assoc, $member_data);
            
            // Check update result
            if($update_result == FALSE){
                echo 0;
                return;
            }
            
            // Reset session data
            $this->gnc_authen->reset_session_member();
            
            echo 1;
        }
        
    
        function all_farmer_page(){
            
            // Get members
            $where_assoc = array();
            $where_assoc['member_type_id'] = $this->Member_type->member_farmer_id;
            $where_assoc['member_status_id'] = $this->Status->status_normal_id;
            $where_assoc['farm_status_id'] = $this->Status->status_normal_id;
            $join_farm = $this->gnc_query->get_join_table_assoc('farm', 'farm.farm_member_id = member_view.member_id', 'left');
            $join_project = $this->gnc_query->get_join_table_assoc('project', 'project.project_farm_id = farm.farm_id');
            $join_arr = [$join_farm, $join_project];
            
            $add_arr = array(
                        'use_view' => TRUE,
                        'group_by' => 'member_id'
                    );
            
            $farmers = $this->Member->get_filter('*, count(project_id)', $where_assoc, $join_arr, null, null, null, 'object', $add_arr);
            
            $data['farmers'] = $farmers;
            
            // Load view
            $this->load->view('main/allAgriculturist', $data);
        }
    
    }
    