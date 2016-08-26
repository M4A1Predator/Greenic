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
            $this->load->library('image_lib');
            $this->load->library('upload');
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function add_project_page(){
            /*
             *  Load add project page
             */
            
            // Check is sign in
            $this->gnc_authen->redirect_if_not_sign_in();
            
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
            if($this->gnc_authen->is_sign_in() == FALSE){
                echo 0;
                return;
            }
            
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
            if($this->gnc_authen->is_sign_in() == FALSE){
                echo 0;
                return;
            }
            
            $this->form_validation->set_rules('unit_id', 'unit_id', 'required|numeric');
            $this->form_validation->set_rules('ppu', 'ppu', 'required|numeric');
            $this->form_validation->set_rules('quantity', 'quantity', 'required|numeric');
            $this->form_validation->set_rules('lowest_order', 'lowest_order', 'required|numeric');
            $this->form_validation->set_rules('start_date', 'start_date', 'required');
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
            $start_date = $this->input->post('start_date');
            $sell_date = $this->input->post('sell_date');
            
            // Filter only selected shipment methods
            $shipment_arr = array();
            foreach($shipment as $id => $val){
                if($val == 'true'){
                    $shipment_arr[] = $id;
                }
            }
            
            // Set flash data for step2
            $step2_data = array();
            $step2_data['add_project_unit_id'] = $unit_id;
            $step2_data['add_project_ppu'] = $ppu;
            $step2_data['add_project_quantity'] = $quantity;
            $step2_data['add_project_lowest_order'] = $lowest_order;
            $step2_data['add_project_sell_date'] = $sell_date;
            $step2_data['add_project_start_date'] = $start_date;
            $step2_data['add_project_shipment'] = $shipment_arr;
            
            // Set session
            $this->session->set_userdata($step2_data);
            
            //echo json_encode($this->session->flashdata(), JSON_UNESCAPED_UNICODE);
            echo 1;
        }
        
        
        function add_project_step3_ajax(){
            /*
             *  Add project step3
             *  
             */
            if($this->gnc_authen->is_sign_in() == FALSE){
                echo 0;
                return;
            }
            
            // Check if has image by key
            if(array_key_exists('cover_image', $_FILES) == FALSE){
                echo 'no image';
                return;
            }
            
            // Check file type
            // Get file type
            $cover_image_ext = pathinfo($_FILES['cover_image']['name'], PATHINFO_EXTENSION);
            $cover_image_type = $_FILES['cover_image']['type'];
            // File muse be image
            if(strpos($cover_image_type, 'image') !== 0){
                echo 'type error';
                return;
            }
            // Add project to DB
            
            // Prepare data
            
            $project_data_assoc = array();
            $project_data_assoc['project_name'] = $this->session->userdata('add_project_name');
            $project_data_assoc['project_detail'] = $this->session->userdata('add_project_detail');
            $project_data_assoc['project_startdate'] = $this->session->userdata('add_project_start_date');
            $project_data_assoc['project_selldate'] = $this->session->userdata('add_project_sell_date');
            $project_data_assoc['project_quantity'] = $this->session->userdata('add_project_quantity');
            $project_data_assoc['project_ppu'] = $this->session->userdata('add_project_ppu');
            $project_data_assoc['project_lowest_order'] = $this->session->userdata('add_project_lowest_order');
            $project_data_assoc['project_category_id'] = $this->session->userdata('add_project_category_id');
            $project_data_assoc['project_unit_id'] = $this->session->userdata('add_project_unit_id');
            $project_data_assoc['project_farm_id'] = $this->session->userdata('add_project_farm_id');
            
            // Get generated unique id
            $uq_id = uniqid();
            $hash_uq_id = hash('sha1', $uq_id);
            // Set image name and path
            $cover_image_name = 'prm_'.$this->session->userdata('member_id').'_'.$hash_uq_id.'.'.$cover_image_ext;
            $cover_image_path = PROJECT_IMAGE_PATH;
            $project_data_assoc['project_cover_image_path'] = $cover_image_path.$cover_image_name;
            
            // Add project
            //$this->db->trans_start(TRUE);
            $this->db->trans_begin();
            $added_project_id = $this->Project->add_project($project_data_assoc);
            //$this->db->trans_complete();
            
            if($added_project_id == NULL){
                echo 'add failed';
                $this->db->trans_rollback();
                return;
            }
            
            // Add shipment methods
            $shipment_arr = $this->session->userdata('add_project_shipment');
            // Create product shipment data
            $shipment_data_arr = array();
            foreach($shipment_arr as $shipment_id){
                $shipment_data_arr[] = array(
                                'product_shipment_project_id' => $added_project_id,
                                'product_shipment_shipment_id' => $shipment_id
                            );
            }
            // Add product shipment data to DB
            $added_product_shipment_rows = $this->Product_shipment->add_multiple($shipment_data_arr);
            
            //echo var_dump($shipment_data_arr);
            //echo "added ".$this->Product_shipment->add_multiple($shipment_data_arr);
            //$this->db->trans_rollback();
            //return;
            
            // Upload cover image
            // Resize image
            $resize_config['image_library'] = 'gd2';
            $resize_config['source_image'] = $_FILES['cover_image']['tmp_name'];
            $resize_config['create_thumb'] = FALSE;
            $resize_config['maintain_ratio'] = TRUE;
            $resize_config['width']         = 1660;
            $resize_config['height']       = 440;
            
            $this->image_lib->initialize($resize_config);
            $this->image_lib->resize();
            
            // Set upload image config
            $upload_config = array();
            $upload_config['upload_path'] = $cover_image_path;
            $upload_config['allowed_types'] = 'gif|jpg|png|jpeg';
            $upload_config['remove_spaces'] = true;
            $upload_config['max_size']	= '4048';
            $upload_config['max_width']  = '2100';
            $upload_config['max_height']  = '2100';
            $upload_config['file_name'] = $cover_image_name;
            $upload_config['overwrite'] = TRUE;
            $fieldname = 'cover_image';  //input tag name
            
            // Check upload result
            $this->upload->initialize($upload_config);
            if(!$this->upload->do_upload($fieldname)){
                echo 'cant upload'.$this->upload->display_errors();
                $this->db->trans_rollback();
                return;
            }
            
            // Get uploaded data
            $ud = $this->upload->data();
            
            // Complete DB transaction
            //$this->db->trans_complete();
            $this->db->trans_commit();
            
            // Clear session data
            // Get session keys
            $session_key_arr = array_keys($this->session->userdata());
            foreach($session_key_arr as $session_key){
                if(strpos($session_key, 'add_project') === 0){
                    $this->session->mark_as_flash($session_key);
                }
            }
            $this->check_first_project();
            
            echo 1;
        }
        
        
        function check_first_project(){
            /*
             *  If this is first project
             *  Then change member type
             *
             */
            
            
            // Change member type if first project
            if($this->session->userdata('member_type_name') == $this->Member_type->member_normal){
                $this->Member->change_member_type($this->session->userdata('member_id'), $this->Member_type->member_farmer_id);
                $this->gnc_authen->reset_session_member();
            }
        }
        
        function member_projects_page(){
            /*
             *  Load manage project page
             *
             */
            
            $this->load->view('main/userProject');
            
        }
        
        function get_member_projects_ajax(){
            /*
             *  Get member projects
             *
             */
            
            // check login
            if($this->gnc_authen->is_sign_in() == FALSE){
                echo 0;
                return;
            }
            
            // Set form rules
            $this->form_validation->set_rules('type_id', 'type_id', 'required|numeric');
            //$this->form_validation->set_rules('category_id', 'category_id', 'required|numeric');
            $this->form_validation->set_rules('farm_id', 'farm_id', 'required|numeric');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
            // Get and set input data
            $type_id = intval($this->input->post('type_id'));
            $farm_id = intval($this->input->post('farm_id'));
            
            $member_id = $this->session->userdata('member_id');
            
            // Set where clause
            $where_assoc = array();
            $where_assoc['farm_member_id'] = $member_id;
            // if id = 0, means get all ids
            if($type_id !== 0){
                $where_assoc['category_project_type_id'] = $type_id;
            }
            
            if($farm_id !== 0){
                $where_assoc['project_farm_id'] = $farm_id;
            }
            
            // Set order
            $order_by = 'project_time DESC';
            
            // Get projects array
            $project_arr = $this->Project->get_filter('*', $where_assoc, null, $order_by, null, null, 'array', array('use_view' => TRUE));
            
            // Encode JSON
            $project_arr_json = json_encode($project_arr, JSON_UNESCAPED_UNICODE);
            
            echo $project_arr_json;
        }
        
        function view_project_page($project_id){
            /*
             * Open Project page
             *
             * @param   int     Project ID
             *
             */
            
            // Check login
            $is_sign_in =$this->gnc_authen->is_sign_in();
            
            // Get project
            $project = $this->Project->get_project_by_id($project_id, 'object', TRUE);
            if(!$project){
                redirect('404_override');
                return;
            }
            
            // Set view data
            $data_assoc = array();
            $data_assoc['project'] = $project;
            $data_assoc['is_sign_in'] = $is_sign_in;
            $data_assoc['is_owner'] = FALSE;
            $data_assoc['is_follow_project'] = FALSE;
            $data_assoc['is_follow_farmer'] = FALSE;
            //echo var_dump($project->project_unit_name);
            //return;
            // Check if project owner
            if($is_sign_in){
                $member_id = $this->session->userdata('member_id');
                if($project->farm_member_id === $member_id){
                    $data_assoc['is_owner'] = TRUE;
                }
            }
            
            // Load view
            $this->load->view('main/singleProduct', $data_assoc);
            
        }
    }