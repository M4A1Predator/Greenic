<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Article extends MY_Model{
        
        public $table = 'article';
        
        function __construct(){
            parent::__construct();
        }
        
        
        
    }