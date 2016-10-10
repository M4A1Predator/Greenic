<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Breed extends MY_Model{
        
        public $table = 'breed';
        
        function __construct(){
            parent::__construct();
        }
        
        function is_dup($breed_data){
            
            // Check dup
            $where_assoc = array();
            $where_assoc['breed_name'] = $breed_data['breed_name'];
            
            $breeds = $this->get_filter('*', $where_assoc);
            if($breeds){
                return TRUE;
            }
            
            return FALSE;
        }
        
    }