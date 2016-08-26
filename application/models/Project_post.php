<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Project_post extends MY_Model{
        
        public $table = 'project_post';
        
        function __construct(){
            parent::__construct();
        }
        
        function add_project_post($project_id, $caption, $detail, $image){
            /*
             *  Add timeline post to DB
             *
             *  @param  int     project id
             *  @param  string  post caption
             *  @param  string  post detail of picture
             *  @param  string  image path
             *
             *  @return int insert id
             */
            
            // Prepare data
            $data_assoc = array();
            $data_assoc['project_post_project_id'] = $project_id;
            $data_assoc['project_post_caption'] = $caption;
            $data_assoc['project_post_detail'] = $detail;
            $data_assoc['image'] = $image;
            
            // Add to DB
            $add_result = $this->add($data_assoc);
            
            // If add failed then return NULL
            if($add_result == FALSE){
                return NULL;
            }
            
            // return insert id
            return $this->db->insert_id();
        }
        
    }