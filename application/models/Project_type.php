<?php
    // On start
    
    class Project_type extends MY_Model{
        
        public $table = 'project_type';
        
        public $vegetable = 'vegetable';
        public $fruit = 'fruit';
        public $animal = 'animal';
        
        function __construct(){
            parent::__construct();
        }
        
    }