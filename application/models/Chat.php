<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Chat extends MY_Model{
        
        public $table = 'chat';
        
        function __construct(){
            parent::__construct();
        }
        
    }