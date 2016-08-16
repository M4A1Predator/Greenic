<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Unit extends MY_Model{
        
        public $table = 'unit';
        
        function __construct(){
            parent::__construct();
        }
        
    }