<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Article extends MY_Model{
        
        public $table = 'article';
        
        function __construct(){
            parent::__construct();
        }
        
        function get_article($id, $result_type='object'){
            
            $where_assoc = array();
            $where_assoc['article_id'] = $id;
            
            $join_member = $this->gnc_query->get_join_table_assoc('member_public_view', 'member_public_view.member_id = article.article_member_id');
            $join_status = $this->gnc_query->get_join_table_assoc('status', 'status.status_id = article.article_status_id');
            $join_array = [$join_status, $join_member];
            
            $articles = $this->Article->get_filter('*', $where_assoc, $join_array, null, null, null, $result_type );
            if(!$articles){
                return null;
            }
            $article = $articles[0];
            return $article;
            
        }
        
        function get_all_articles($data, $result_type='array'){
            
            $limit = $data['limit'];
            $offset = $data['offset'];
            $order_by = $data['order_by'];
            
            $where_assoc = array();
            $where_assoc['article_status_id'] = $this->CI->Status->status_publish_id;
            
            $join_member = $this->gnc_query->get_join_table_assoc('member_public_view', 'member_public_view.member_id = article.article_member_id');
            $join_status = $this->gnc_query->get_join_table_assoc('status', 'status.status_id = article.article_status_id');
            $join_array = [$join_status, $join_member];
            
            $articles = $this->Article->get_filter('*', $where_assoc, $join_array, $order_by, $offset, $limit, $result_type );
            $article_count = $this->Article->get_filter_count('*', $where_assoc, $join_array, $order_by, $offset, $limit, $result_type );
            
            // Set data
            $res_data = array();
            $res_data['article_arr'] = $articles;
            $res_data['article_count'] = $article_count;
            
            return $res_data;
            
        }
        
        
    }