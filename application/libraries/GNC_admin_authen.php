<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class GNC_admin_authen{
        
        protected $CI;
        public $c = 0;
        
        function __construct(){
            $this->CI =& get_instance();
            $this->CI->lang->load('general_message', $this->CI->config->item('web_language'));
        }
        
        function is_sign_in(){
            /*
             *  Check is logged in
             *
             */
            
            // Get session admin data
            $admin_id = $this->CI->session->userdata('admin_id');
            $admin_email = $this->CI->session->userdata('member_email');
            $admin_username = $this->CI->session->userdata('admin_username');
            
            // Check session values
            if(!$admin_id || !$admin_email || !$admin_username ){
                return FALSE;
            }
            
            return TRUE;
            
        }
        
        function redirect_if_not_sign_in($uri='gnc_admin/sign_in'){
            /*
             *  Redirect to given uri
             *  If not sign in
             *
             *  @param  string  uri
             *  
             */
            
            // Check if not sign in
            if(!$this->is_sign_in()){
                // Redirect
                redirect($uri);
                return FALSE;
            }
        }
        
    }