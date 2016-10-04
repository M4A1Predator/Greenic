<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Product_status extends MY_Model{
        
        public $table = 'product_status';
        
        function __construct(){
            parent::__construct();
        }
        
    }