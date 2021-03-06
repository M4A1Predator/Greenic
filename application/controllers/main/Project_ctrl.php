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
            $this->form_validation->set_rules('breed_id', 'breed_id', 'numeric');
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
            $breed_id = $this->input->post('breed_id');
            $farm_id = $this->input->post('farm_id');
            $project_detail = $this->input->post('project_detail');
            
            // Check data
            
            // Set project data to session
            $step1_data = array();
            $step1_data['add_project_name'] = $project_name;
            $step1_data['add_project_type_id'] = $project_type_id;
            $step1_data['add_project_category_id'] = $category_id;
            $step1_data['add_project_breed_id'] = $breed_id;
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
            $this->form_validation->set_rules('lowest_order', 'lowest_order', 'numeric');
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
            
            if(!$lowest_order){
                $lowest_order = 0;
            }
            
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
            //if(array_key_exists('cover_image', $_FILES) == FALSE){
            //    echo 'no image';
            //    return;
            //}
            
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
            if($this->session->userdata('add_project_breed_id')){
                $project_data_assoc['project_breed_id'] = $this->session->userdata('add_project_breed_id');
            }
            $project_data_assoc['project_unit_id'] = $this->session->userdata('add_project_unit_id');
            $project_data_assoc['project_farm_id'] = $this->session->userdata('add_project_farm_id');
            
            // Check image
            if(array_key_exists('cover_image', $_FILES)){
                // Check file type
                // Get file type
                $cover_image_ext = pathinfo($_FILES['cover_image']['name'], PATHINFO_EXTENSION);
                $cover_image_type = $_FILES['cover_image']['type'];
                // File muse be image
                if(strpos($cover_image_type, 'image') !== 0){
                    echo 'type error';
                    return;
                }
                    
                // Get generated unique id
                $uq_id = uniqid();
                $hash_uq_id = hash('sha1', $uq_id);
                // Set image name and path
                $cover_image_name = 'prm_'.$this->session->userdata('member_id').'_'.$hash_uq_id.'.'.$cover_image_ext;
                $cover_image_path = PROJECT_IMAGE_PATH.'covers/';
                $project_data_assoc['project_cover_image_path'] = $cover_image_path.$cover_image_name;
                
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
                $upload_config['max_size']	= '20000';
                $upload_config['max_width']  = '5000';
                $upload_config['max_height']  = '5000';
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
                
            }
            
            // Add project
            //$this->db->trans_start(TRUE);
            $this->db->trans_begin();
            $added_project_id = $this->Project->add_project($project_data_assoc);
            //$this->db->trans_complete();
            
            // Check add result
            if($added_project_id == NULL){
                echo 'add failed';
                $this->db->trans_rollback();
                return;
            }
            
            //echo 'added';
            //$this->db->trans_rollback();
            //return;
            
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
            //echo var_dump($shipment_data_arr);
            
            $added_product_shipment_rows = $this->Product_shipment->add_multiple($shipment_data_arr);
            //echo var_dump($shipment_data_arr);
            //echo "added ".$this->Product_shipment->add_multiple($shipment_data_arr);
            //$this->db->trans_rollback();
            //return;
            
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
        
        function edit_project_page($project_id){
            /*
             *  Load edit project page
             *
             *  @param  int project id
             *  @param  string  step
             *  
             */
            // Check is sign in
            $this->gnc_authen->redirect_if_not_sign_in();
            
            // Get data
            $member_id = $this->session->userdata('member_id');
            
            // Prepare data
            
            // Get project
            $where_assoc = array();
            $where_assoc['project_id'] = $project_id;
            $where_assoc['farm_member_id'] = $member_id;
            
            $results = $this->Project->get_filter('*', $where_assoc, null, null, null, null, 'object', array('use_view' => TRUE));
            if(!$results){
                redirect('/main/');
                return;
            }
            
            $project = $results[0];
            
            // Get shipments
            $shipment_arr = $this->Shipment->get_filter('*', null, null, null, null, null, 'array');
            // Get product status
            $product_status_arr = $this->Product_status->get_filter('*', null, null, null, null, null, 'array');
            
            // Set data
            $data['project'] = $project;
            $data['shipment_arr'] = $shipment_arr;
            $data['product_status_arr'] = $product_status_arr;
            
            // Load view
            $this->load->view('main/editProject', $data);
            // flush
            ob_flush();
        }
        
        
        function edit_project_ajax(){
            $this->form_validation->set_rules('project_id', 'project_id', 'required|numeric');
            $this->form_validation->set_rules('project_name', 'project_name', 'required');
            $this->form_validation->set_rules('project_product_status_id', 'project_product_status_id', 'required|numeric');
            $this->form_validation->set_rules('project_category_id', 'project_category_id', 'required|numeric');
            $this->form_validation->set_rules('project_breed_id', 'project_breed_id', 'numeric');
            $this->form_validation->set_rules('project_detail', 'project_detail');
            $this->form_validation->set_rules('project_farm_id', 'project_farm_id', 'required|numeric');
            $this->form_validation->set_rules('project_unit_id', 'project_unit_id', 'required');
            $this->form_validation->set_rules('project_ppu', 'project_ppu', 'required|numeric');
            $this->form_validation->set_rules('project_quantity', 'project_quantity', 'required|numeric');
            $this->form_validation->set_rules('project_lowest_order', 'project_lowest_order', 'required|numeric');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
            // Get data
            $project_id = $this->input->post('project_id');
            $project_name = $this->input->post('project_name');
            $project_product_status_id = $this->input->post('project_product_status_id');
            $project_category_id = $this->input->post('project_category_id');
            $project_breed_id = ($this->input->post('project_breed_id'))?$this->input->post('project_breed_id'):null;
            $project_detail = $this->input->post('project_detail');
            $project_farm_id = $this->input->post('project_farm_id');
            $project_unit_id = $this->input->post('project_unit_id');
            $project_ppu = $this->input->post('project_ppu');
            $project_quantity = $this->input->post('project_quantity');
            $project_lowest_order = $this->input->post('project_lowest_order');
            $project_startdate = $this->input->post('project_startdate');
            $project_selldate = $this->input->post('project_selldate');
            $shipment = $this->input->post('shipment');
            
            // Check project
            $where_assoc = array();
            $where_assoc['project_id'] = $project_id;
            $projects = $this->Project->get_filter('*', $where_assoc, null, null, null, null, 'object', array('use_view' => TRUE));
            $project = ($projects)?$projects[0]:null;
            if(!$project){
                echo 0;
                return;
            }
            
            if($project->member_id != $this->session->userdata('member_id')){
                echo 0;
                return;
            }
            
            // Update data
            $where_assoc = array();
            $where_assoc['project_id'] = $project_id;
            
            $project_data = array();
            $project_data['project_name'] = $project_name;
            $project_data['project_product_status_id'] = $project_product_status_id;
            $project_data['project_category_id'] = $project_category_id;
            $project_data['project_breed_id'] = $project_breed_id;
            $project_data['project_detail'] = $project_detail;
            $project_data['project_farm_id'] = $project_farm_id;
            $project_data['project_unit_id'] = $project_unit_id;
            $project_data['project_ppu'] = $project_ppu;
            $project_data['project_lowest_order'] = $project_lowest_order;
            $project_data['project_startdate'] = $project_startdate;
            $project_data['project_selldate'] = $project_selldate;
            
            // Upload image if has an image
            $image_field_name = 'project_cover_image';
            if(array_key_exists($image_field_name, $_FILES)){
                $this->load->library('gnc_image');
                $image_file = $_FILES[$image_field_name];
                
                // Check file
                if($this->gnc_image->is_image_file($image_file) == FALSE){
                    $err_arr = array('err' => 'invalid image type');
                    echo json_encode($err_arr);
                    return;
                }
                
                // Generate file name
                $cover_image_ext = pathinfo($_FILES[$image_field_name]['name'], PATHINFO_EXTENSION);
                $cover_image_name = $this->gnc_image->generate_file_name('prm_'.$this->session->userdata('member_id').'_').'.'.$cover_image_ext;
                $cover_image_path = PROJECT_IMAGE_PATH.'covers/';
                $project_data['project_cover_image_path'] = $cover_image_path.$cover_image_name;
                
                // Resize
                // Resize image
                $resize_config['image_library'] = 'gd2';
                $resize_config['source_image'] = $_FILES[$image_field_name]['tmp_name'];
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
                $upload_config['max_size']	= '20000';
                $upload_config['max_width']  = '5000';
                $upload_config['max_height']  = '5000';
                $upload_config['file_name'] = $cover_image_name;
                $upload_config['overwrite'] = TRUE;
                
                // Check upload result
                $this->upload->initialize($upload_config);
                if(!$this->upload->do_upload($image_field_name)){
                    echo 'cant upload'.$this->upload->display_errors();
                    return;
                }
                
                // Get uploaded data
                $ud = $this->upload->data();
                
                // If has old image, then remove it
                if($project->project_cover_image_path){
                    $old_path = $project->project_cover_image_path;
                    $old_full_path = getcwd().'/'.$old_path;
                    if(file_exists($old_full_path)){
                        unlink($old_full_path);
                    }
                }
                
            }
            
            $update_result = $this->Project->update($where_assoc, $project_data);
            if(!$update_result){
                $err_arr = array('err' => 'update failed');
                echo json_encode($err_arr);
                return;
            }
            
            // Update shipment
            $shipment = json_decode($shipment);
            // Filter only selected shipment methods
            $shipment_arr = array();
            foreach($shipment as $id => $val){
                if($val == 'true'){
                    $shipment_arr[] = $id;
                }
            }
            
            //echo var_dump($shipment_arr);
            
            $edit_shipment_result = $this->Product_shipment->edit_product_shipment($project_id, $shipment_arr);
            
            echo 1;
            
        }
        
        function member_projects_page(){
            /*
             *  Load manage project page
             *
             */
            
            $this->load->view('main/userProject');
            ob_flush();
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
            //$this->form_validation->set_rules('type_id', 'type_id', 'required|numeric');
            ////$this->form_validation->set_rules('category_id', 'category_id', 'required|numeric');
            //$this->form_validation->set_rules('farm_id', 'farm_id', 'required|numeric');
            //
            //// Validate form
            //if($this->form_validation->run() == FALSE){
            //    echo 0;
            //    return;
            //}
            
            // Get and set input data
            $type_id = intval($this->input->get('type_id'));
            $farm_id = intval($this->input->get('farm_id'));
            $offset = $this->input->get('offset');
            $limit = $this->input->get('limit');
            
            $member_id = $this->session->userdata('member_id');
            
            // Set where clause
            $where_assoc = array();
            $where_assoc['farm_member_id'] = $member_id;
            $where_assoc['project_status_id'] = $this->Status->status_normal_id;
            $where_assoc['member_status_id'] = $this->Status->status_normal_id;
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
            $project_arr = $this->Project->get_filter('*', $where_assoc, null, $order_by, $offset, $limit, 'array', array('use_view' => TRUE));
            $project_count = $this->Project->get_filter_count('*', $where_assoc, null, $order_by, null, null, 'array', array('use_view' => TRUE));
            
            // Set data
            $data['result'] = $project_arr;
            $data['count'] = $project_count;
            
            // Encode JSON
            $data_json = json_encode($data, JSON_UNESCAPED_UNICODE);
            
            echo $data_json;
        }
        
        function view_project_page($project_id){
            /*
             * Open Project page
             *
             * @param int Project ID
             *
             */
            
            // Check login
            $is_sign_in =$this->gnc_authen->is_sign_in();
            
            // Get project
            $where_project_assoc = array();
            $where_project_assoc['project_id'] = $project_id;
            $where_project_assoc['project_status_id'] = $this->Status->status_normal_id;
            $p_results = $this->Project->get_filter('*', $where_project_assoc, null, null, null, null, 'object', array('use_view' => TRUE));
            if(!$p_results){
                redirect('404_override');
                return;
            }
            $project = $p_results[0];
            
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
            $data_assoc['is_follow_farm'] = FALSE;
            $data_assoc['is_follow_farmer'] = FALSE;
            $data_assoc['is_review_project'] = FALSE;
            $data_assoc['is_updatable'] = FALSE;

            // If sign in
            if($is_sign_in){
                // Check if project owner
                $member_id = $this->session->userdata('member_id');
                if($project->farm_member_id === $member_id){
                    $data_assoc['is_owner'] = TRUE;
                    
                    // Check is updatable
                    if((int)$project->farm_status_id === $this->Status->status_normal_id && (int)$project->project_status_id !== $this->Status->status_removed_id){
                        $data_assoc['is_updatable'] = TRUE;
                    }                    
                }
                
                // Is following this project
                $follow_type_id_assoc = array();
                $follow_type_id_assoc['follow_project_id'] = $project_id;
                
                // Get follow record
                $follow_array = $this->Follow->get_follow_by_target_array($member_id, $follow_type_id_assoc);
                
                // Check what member is following
                if($follow_array){
                    $data_assoc['is_follow_project'] = TRUE;
                }

            }
            
            // Check is review this project
            if($this->is_sign_in){
                $data_assoc['is_review_project'] = $this->Review->has_ever_review_project($member_id, $project_id);
            }
            
            // Add view
            if($data_assoc['is_owner'] == FALSE){
                // Plus view
                $view_number = (int)$project->project_view;
                $view_number += 1;
                
                // Prepare update data
                $project_data = array();
                $project_data['project_id'] = $project->project_id;
                
                $update_data = array();
                $update_data['project_view'] = $view_number;
                
                $update_result = $this->Project->update($project_data, $update_data);
            }
            
            // Get reviews
            // Set up filter
            $filter_assoc = array();
            $filter_assoc['limit'] = null;
            $filter_assoc['offset'] = 0;
            
            $review_data= $this->Review->get_review_data_by_project_id($project_id, $filter_assoc, 'array');
            $review_arr = $review_data['result'];
            $review_count = $review_data['count'];
            
            $data_assoc['review_arr'] = $review_arr;
            $data_assoc['review_count'] = $review_count;
            // Set review rate
            $review_rate = 0.0;
            $total_rate = 0;
            $rate_select_arr = [0, 0, 0, 0, 0];
            foreach($review_arr as $review){
                $rate = (int)$review['review_rate'];
                
                $rate_select_arr[$rate-1] += 1;
                
                $total_rate += $rate;
            }
            if($review_count !== 0){
                $review_rate = (float)($total_rate / $review_count);
            }else{
                $review_rate = 0;
            }
            
            $data_assoc['review_rate'] = $review_rate;
            $data_assoc['rate_select_arr'] = $rate_select_arr;
            
            // Load view
            $this->load->view('main/singleProduct', $data_assoc);
            ob_flush();
        }
    
    
    
        function remove_project_ajax(){
            
            // check login
            if($this->gnc_authen->is_sign_in() == FALSE){
                echo 0;
                return;
            }
            
            // Get data
            $member_password = $this->input->post('member_password');
            $project_id = $this->input->post('project_id');
            $member_id = $this->session->userdata('member_id');
            
            // Check member password
            
            // Check is project owner
            $is_owner = $this->Project->is_project_owner($member_id, $project_id);
            if(!$is_owner){
                $err_arr = array(
                            'err' => 'not owner',
                        );
                echo json_encode($err_arr);
                return;
            }
            
            // Remove project
            $where_assoc = array();
            $where_assoc['project_id'] = $project_id;
            
            $update_data = array();
            $update_data['project_status_id'] = $this->Status->status_removed_id;
            
            $remove_result = $this->Project->update($where_assoc, $update_data);
            if(!$remove_result){
                $err_arr = array(
                            'err' => 'update error',
                        );
                echo json_encode($err_arr);
                return;
            }
            
            echo 1;
            
        }
    
    }