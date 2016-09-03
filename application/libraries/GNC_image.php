<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class GNC_Image{
        
        protected $CI;
        
        public $default_member_img_path = 'files/defaults/member/user.jpg';
        
        function __construct(){
            $this->CI =& get_instance();
        }
        
        function is_image_file($file){
            /*
             *  Check if file is image file or not
             *
             *  @param  array   file
             *  
             *  @return bool    true is image or false if otherwise
             */
            
            if(!$file){
                return FALSE;
            }
            
            // Get file type
            $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $file_type = $file['type'];
            
            // File muse be image
            if(strpos($file_type, 'image') !== 0){
                return FALSE;
            }
            
            return TRUE;
        }
        
        function generate_file_name($prefix='', $algo='sha1'){
            /*
             *  Generate file name
             *
             *  @param  string  prefix of file name
             *  @param  string  algorithm
             *
             *  @return filename as string
             *  
             */
            
            // Generate unique id
            $uq_id = uniqid();
            $hash_uq_id = hash($algo, $uq_id);
            
            // Set name
            $file_name = $prefix.$hash_uq_id;
            
            return $file_name;
            
        }
        
        function resize_image(){
            
        }
        
    }