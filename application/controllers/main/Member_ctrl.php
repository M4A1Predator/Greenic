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
            
            // Load model
            
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
            
            // Set data
            $data_assoc = array();
            $data_assoc['member'] = $member;
            
            
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
                // Set upload image config
                $config = array();
                $config['upload_path'] = MEMBER_IMAGE_PATH;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = true;
                $config['max_size']	= '4048';
                $config['max_width']  = '2100';
                $config['max_height']  = '2100';
                $config['file_name'] = '';
                $config['overwrite'] = TRUE;
                $fieldname = 'member_image';  //input tag name
                
                if(file_exists($dealer['dealer_picture'])){
                    unlink($dealer['dealer_picture']);
                }
                
                $this->upload->initialize($config);
                if(!$this->upload->do_upload($fieldname)){
                    //echo "test".$this->upload->display_errors();
                    $this->session->set_flashdata('msgprofile', 'ไฟล์รูปภาพไม่ถูกต้อง');
                    echo "<script>window.history.back();</script>";
                    return;
                }
                $ud = $this->upload->data();
            }
            
        }
    }