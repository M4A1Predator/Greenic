<?php
    // On start
    
    class Member_type extends GNC_Model{
        
        public $member_admin = 'admin';
        public $member_normal = 'normal';
        public $member_farmer = 'farmer';
        
        public $table = 'member_type';
        
        function __construct(){
            parent::__construct();    
        }
        
    }