<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Sub_district extends MY_Model{
        
        public $table = 'sub_district';
        
        function __construct(){
            parent::__construct();
        }
        
    }