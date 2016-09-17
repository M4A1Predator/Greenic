<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Webdata extends MY_Model{
        
        public $table = 'webdata';
        
        function __construct(){
            parent::__construct();
        }

        
    }