<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Post extends MY_Model{
        
        public $table = 'post';
        
        function __construct(){
            parent::__construct();
        }
        
    }