<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Province extends MY_Model{
        
        public $table = 'province';
        
        function __construct(){
            parent::__construct();
        }
        
    }