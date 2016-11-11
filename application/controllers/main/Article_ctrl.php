<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Article_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function get_last_articles_ajax(){
            
            $limit = 3;
            
            // Get articles
            $where_assoc = array();
            $where_assoc['article_status_id'] = $this->Status->status_publish_id;
            
            $join_member = $this->gnc_query->get_join_table_assoc('member_public_view', 'member_public_view.member_id = article.article_member_id');
            $join_status = $this->gnc_query->get_join_table_assoc('status', 'status.status_id = article.article_status_id');
            $join_array = [$join_status, $join_member];
            
            $order_by = 'article_time DESC';
            
            $article_arr = $this->Article->get_filter('*', $where_assoc, $join_array, $order_by, null, $limit, 'array');
            
            // Set data
            $data['result'] = $article_arr;
            
            // JSON
            $data_json = json_encode($data, JSON_UNESCAPED_UNICODE);
            
            $this->output->set_output($data_json);
        }
        
        function all_articles_page(){
            
            // Load view
            $this->load->view('main/article');
        }
        
        function get_all_articles_ajax(){
            
            // Get data
            $page = $this->input->get('page');
            $limit = ($this->input->get('limit'))?$this->input->get('limit'):16;
            if(!$page){
                $page = 1;
            }
            
            $offset = ($page * $limit) - $limit;
            
            // Get all articles
            $article_filter_data = array(
                        'offset' => $offset,
                        'limit' => $limit,
                        'order_by' => 'article_time DESC',
                    );
            
            $article_data = $this->Article->get_all_articles($article_filter_data, 'array');
            
            // json
            $data_json = json_encode($article_data, JSON_UNESCAPED_UNICODE);
            
            $this->output->set_output($data_json);
            
        }
        
        
        function view_article_page(){
            
            $article_id = $this->uri->segment(2);
            if(!is_numeric($article_id)){
                redirect('/main/');
                return;
            }
            
            // Get article
            $where_assoc = array();
            $where_assoc['article_id'] = $article_id;
            $where_assoc['article_status_id'] = $this->Status->status_publish_id;
            
            $join_member = $this->gnc_query->get_join_table_assoc('member_public_view', 'member_public_view.member_id = article.article_member_id');
            $join_status = $this->gnc_query->get_join_table_assoc('status', 'status.status_id = article.article_status_id');
            $join_array = [$join_status, $join_member];
            
            $articles = $this->Article->get_filter('*', $where_assoc, $join_array, null, null, null);
            if(!$articles){
                redirect('/main/');
                return;
            }
            
            $article = $articles[0];
            
            // Update view
            $view_count = (int)$article->article_view;
            $view_count += 1;
            $update_where = array( 'article_id' => $article->article_id );
            $update_data = array( 'article_view' => $view_count );
            $this->Article->update($update_where, $update_data);
            
            // Set data
            $data['article'] = $article;
            
            // Load view
            $this->load->view('main/showArticle', $data);
            ob_flush();
        }
        
        
    }