<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Product_shipment extends MY_Model{
        
        public $table = 'product_shipment';
        
        function __construct(){
            parent::__construct();
        }
        
    }