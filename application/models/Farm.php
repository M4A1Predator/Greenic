<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Farm extends MY_Model{
        
        public $table = 'farm';
        
        function __construct(){
            parent::__construct();
        }
        
    }