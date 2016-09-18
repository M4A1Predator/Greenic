<?php
    // On start
    
    class Page_manage extends MY_Model{
        public $page_allProject = 'allProject';
        public $page_allFarm    = 'allFarm';
        public $page_allCategory = 'allCategory';
        public $page_allUnit  = 'allUnit';
        public $page_allSpecies = 'allSpecies';
        public $page_getFarmId = 'getFarmId';
        
        
        function __construct(){
            parent::__construct();
        }
    
    }