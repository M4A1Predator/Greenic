<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Breed extends MY_Model{
        
        public $table = 'breed';
        
        function __construct(){
            parent::__construct();
        }
        
    }