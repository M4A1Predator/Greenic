<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class District extends MY_Model{
        
        public $table = 'district';
        
        function __construct(){
            parent::__construct();
        }
        
    }