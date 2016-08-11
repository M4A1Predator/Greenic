<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class GNC_Authen{
        
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
            
            // Get session member data
            $member_id = $this->CI->session->userdata('member_id');
            $member_email = $this->CI->session->userdata('member_email');
            
            // Check session values
            if(!$member_id || !$member_email ){
                return FALSE;
            }
            
            return TRUE;
            
        }
        
        function reset_session_member(){
            /*
             *  Reset value in session
             *  use when change something in DB
             *
             */
            
            // Get member id from session
            $member_id = $this->CI->session->userdata('member_id');
            
            // Re-get member data
            $member = $this->CI->Member->get_member_session_data_by_id($member_id);
            
            if(!$member){
                redirect('/main/');
                return;
            }
            
            // Reset session values
            $this->CI->session->set_userdata($member);
        }
        
        function redirect_if_not_sign_in($uri='main/'){
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
            }
        }
        
    }