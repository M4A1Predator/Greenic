<?php
    // On start
    
    class Status extends MY_Model{
        
        public $table = 'status';
        
        public $status_normal = 'normal';
        public $status_banned = 'banned';
        public $status_publish = 'publish';
        public $status_draft = 'draft';
        public $status_removed = 'removed';
        public $status_non_verify = 'non_verify';
        
        public $status_normal_id = 1;
        public $status_banned_id = 2;
        public $status_publish_id = 3;
        public $status_draft_id = 4;
        public $status_removed_id = 5;
        public $status_non_verify_id = 6;
        
        function __construct(){
            parent::__construct();
        }
    
    }