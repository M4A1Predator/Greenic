<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    ob_start();
    class Project_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('form_validation');
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function add_project_page(){
            /*
             *  Load add project page
             */
            
            // Get step from uri
            $step = $this->uri->segment(2, 'step1');
            
            // Prepare data
            $data_assoc = array();
            $data_assoc['step'] = $step;
            
            // Check step and load data
            if($step == 'step1'){
                
                // Load project types
                $project_type_arr = $this->Project_type->get_filter();
                
                // Set data
                $data_assoc['project_type_arr'] = $project_type_arr;
                
            }else if($step == 'step2'){
                // Load shiplments
                $shipment_arr = $this->Shipment->get_filter('*', null, null, null, null, null, 'array');
                
                // Set data
                $data_assoc['shipment_arr'] = $shipment_arr;
            }else if($step == 'step3'){
                
            }

            // Load view
            $this->load->view('main/addProject', $data_assoc);
            // flush
            ob_flush();
            
        }
        
        function add_project_step1_ajax(){
            /*
             *  Process add project step1 data
             *  keep data into session
             *  
             */
            
            // Set form rules
            $this->form_validation->set_rules('type_id', 'type_id', 'required|numeric');
            $this->form_validation->set_rules('category_id', 'category_id', 'required|numeric');
            $this->form_validation->set_rules('farm_id', 'farm_id', 'required|numeric');
            $this->form_validation->set_rules('project_name', 'project_name', 'required');
            $this->form_validation->set_rules('project_detail', 'project_detail', 'required');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
            // Get values
            $project_name = $this->input->post('project_name');
            $project_type_id = $this->input->post('type_id');
            $category_id = $this->input->post('category_id');
            $farm_id = $this->input->post('farm_id');
            $project_detail = $this->input->post('project_detail');
            
            // Check data
            
            // Set project data to session
            $step1_data = array();
            $step1_data['add_project_name'] = $project_name;
            $step1_data['add_project_type_id'] = $project_type_id;
            $step1_data['add_project_category_id'] = $category_id;
            $step1_data['add_project_farm_id'] = $farm_id;
            $step1_data['add_project_detail'] = $project_detail;
            
            // Set as flash data
            $this->session->set_userdata($step1_data);

            echo 1;
        
        }
        
        
        function add_project_step2_ajax(){
            /*
             *  Process add project step2 data
             *  keep data into session
             *  
             */
            $this->form_validation->set_rules('unit_id', 'unit_id', 'required|numeric');
            $this->form_validation->set_rules('ppu', 'ppu', 'required|numeric');
            $this->form_validation->set_rules('quantity', 'quantity', 'required|numeric');
            $this->form_validation->set_rules('lowest_order', 'lowest_order', 'required|numeric');
            $this->form_validation->set_rules('sell_date', 'sell_date', 'required');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
            // Get data
            $shipment = $this->input->post('shipment');
            $unit_id = $this->input->post('unit_id');
            $ppu = $this->input->post('ppu');
            $quantity = $this->input->post('quantity');
            $lowest_order = $this->input->post('lowest_order');
            $sell_date = $this->input->post('sell_date');
            
            // Set flash data for step2
            $step2_data = array();
            $step2_data['add_project_unit_id'] = $unit_id;
            $step2_data['add_project_ppu'] = $ppu;
            $step2_data['add_project_quantity'] = $quantity;
            $step2_data['add_project_lowest_order'] = $lowest_order;
            $step2_data['add_project_sell_date'] = $sell_date;
            $step2_data['add_project_shipment'] = $shipment;
            
            // Set flash data
            $this->session->set_userdata($step2_data);
            
            //echo json_encode($this->session->flashdata(), JSON_UNESCAPED_UNICODE);
            echo 1;
        }
        
        
        function add_project_step3_ajax(){
            /*
             *  Add project step3
             *  
             */
            
            // Check if has image by key
            if(array_key_exists('cover_image', $_FILES) == FALSE){
                echo 0;
                return;
            }
            
            // Add project to DB
            
            // Prepare data
            
            
            // Upload cover image
            // Set upload image config
            /*
            $config = array();
            $config['upload_path'] = PROJECT_IMAGE_PATH;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['remove_spaces'] = true;
            $config['max_size']	= '4048';
            $config['max_width']  = '2100';
            $config['max_height']  = '2100';
            $config['file_name'] = '';
            $config['overwrite'] = TRUE;
            $fieldname = 'member_image';  //input tag name
            
            // Delete if file is exist
            if(file_exists($this->){
                unlink($dealer['dealer_picture']);
            }
            
            $this->upload->initialize($config);
            if(!$this->upload->do_upload($fieldname)){
                //echo "test".$this->upload->display_errors();
                $this->session->set_flashdata('msgprofile', 'ไฟล์รูปภาพไม่ถูกต้อง');
                echo "<script>window.history.back();</script>";
                return;
            }
            $ud = $this->upload->data();*/
            
        }
    }