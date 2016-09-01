<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Activity_type extends MY_Model{
        
        public $table = 'activity_type';
        
        public $activity_type_add_project_id = 1;
        public $activity_type_update_timeline_id = 2;
        public $activity_type_available_id = 3;
        public $activity_type_unvailable_id = 4;
        public $activity_type_out_of_stock = 5;
        
        function __construct(){
            parent::__construct();
        }
        
    }