<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Category extends MY_Model{
        
        public $table = 'category';
        
        function __construct(){
            parent::__construct();
        }
        
    }