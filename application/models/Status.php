<?php
    // On start
    
    class Status extends GNC_Model{
        
        public $table = 'status';
        
        public $status_normal = 'normal';
        public $status_banned = 'banned';
        public $status_publish = 'publish';
        public $status_draft = 'draft';
        public $status_removed = 'removed';
        
        function __construct(){
            parent::__construct();
        }
    
    }