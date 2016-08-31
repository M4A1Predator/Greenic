<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Test_follow extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function get_follow(){
            
            $tar_assoc = array(
                            'follow_project_id' => 33,
                            'follow_farm_id' => 5
                            );
            //$result = $this->Follow->get_follow_by_target_array(4, $tar_assoc);
            $result = $this->Follow->get_follow_by_target_id(4, 33);
            echo var_dump($result).'<br/>';
            echo $this->db->last_query();
            
        }
        
        
        
    }