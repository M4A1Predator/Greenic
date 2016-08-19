<?php
    // On start
    
    class Member_type extends MY_Model{
        
        public $member_admin = 'admin';
        public $member_normal = 'normal';
        public $member_farmer = 'farmer';
        
        public $member_normal_id = 1;
        public $member_farmer_id = 2;
        public $member_admin_id = 3;
        
        public $table = 'member_type';
        
        function __construct(){
            parent::__construct();    
        }
        
    }