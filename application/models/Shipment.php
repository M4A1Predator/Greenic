<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Shipment extends MY_Model{
        
        public $table = 'shipment';
        
        function __construct(){
            parent::__construct();
        }
    }