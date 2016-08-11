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
            $province_arr = $this->Province->get_filter();
            
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
            $this->form_validation->set_rules('firstname', 'firstname', 'required');
            $this->form_validation->set_rules('lastname', 'lastname', 'required');
            $this->form_validation->set_rules('address', 'address');
            $this->form_validation->set_rules('province', 'province');
            $this->form_validation->set_rules('district', 'district');
            $this->form_validation->set_rules('sub_district', 'sub_district');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo validation_errors();
                return;
            }
            
            // Get input value
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $address = $this->input->post('address');
            $province = $this->input->post('province');
            $district = $this->input->post('district');
            $sub_district = $this->input->post('sub_district');
            $email = $this->input->post('email');
            
            if(array_key_exists('member_image', $_FILES)){
                
                // Resize image
                $resize_config = array();
                $resize_config['image_library'] = 'gd2';
                $resize_config['source_image'] = $_FILES['member_image']['tmp_name'];
                $resize_config['create_thumb'] = FALSE;
                $resize_config['maintain_ratio'] = TRUE;
                $resize_config['width']  = 250;
                //$resize_config['height']  = 50;
                $this->image_lib->initialize($resize_config);
                $this->image_lib->resize();
                
                $image_content = file_get_contents($_FILES['member_image']['tmp_name']);
                echo strlen(base64_encode($image_content));
                
                return;
                // Set upload image config
                //$config = array();
                //$config['upload_path'] = MEMBER_IMAGE_PATH;
                //$config['allowed_types'] = 'gif|jpg|png|jpeg';
                //$config['remove_spaces'] = true;
                //$config['max_size']	= '4048';
                //$config['max_width']  = '2100';
                //$config['max_height']  = '2100';
                //$config['file_name'] = '';
                //$config['overwrite'] = TRUE;
                //$fieldname = 'member_image';  //input tag name
                //
                //if(file_exists($this->){
                //    unlink($dealer['dealer_picture']);
                //}
                //
                //$this->upload->initialize($config);
                //if(!$this->upload->do_upload($fieldname)){
                //    //echo "test".$this->upload->display_errors();
                //    $this->session->set_flashdata('msgprofile', 'ไฟล์รูปภาพไม่ถูกต้อง');
                //    echo "<script>window.history.back();</script>";
                //    return;
                //}
                //$ud = $this->upload->data();
            }
            
            // Prepare member data
            $member_data = array();    
            $member_data['member_firstname'] = $firstname;
            $member_data['member_lastname'] = $lastname;
            $member_data['member_address'] = $address;
            $member_data['member_province'] = $province;
            $member_data['member_district'] = $district;
            $member_data['member_sub_district'] = $sub_district;
            
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
    }