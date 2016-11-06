<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Product_status extends MY_Model{
        
        public $table = 'product_status';
        
        public $status_waiting_id = 1;
        public $status_available_id = 2;
        public $status_out_of_stock_id = 3;
        
        function __construct(){
            parent::__construct();
        }
        
    }