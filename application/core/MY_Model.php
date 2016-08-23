<?php
    class MY_Model extends CI_Model{
        
        protected $CI;
        
        function __construct(){
            parent::__construct();
            $this->CI =& get_instance();
        }
        
        function get_result($query, $return_type='array'){
            /*
             *  Return qury result as stdClass or associative array
             */
            
            $result = null;
            
            //  If type is array then get array of assoc
            if($return_type == 'array'){
                $result = $query->result_array();
            //  Else get array of stdClass
            }else{
                $result = $query->result();
            }
            
            return $result;
        }
        
        function get_all($result_type = 'object'){
            /*
             *  Get all rows
             *  set $this->table before use this function
             *
             *  @param string @return_type - define result type value : 'object' or 'array'
             */
            
            // Query data
            $this->db->select('*');
            $this->db->from($this->table);
            $query = $this->db->get();
            
            return $this->get_result($query, $result_type);
        }
        
        function get_filter($select='*', $where_assoc=array(), $join_assoc_array=array(), $order=null,  $offset=0, $limit=null, $result_type='object', $data=array()){
            /*
             *  Get filtered rows
             *  set $this->table before use this function
             *
             *  @param String $select: projections
             *  @param assoc $where_assoc: where clause assoc
             *  @param array of assoc $join_assoc: join tables e.g.( 'table'=>'t1', 't0.t0_id = t1.t1_t0_id' )
             *  @param String $order: order field e.g. : 'col1 DESC, col2 ASC'
             *  @param int $offset: Start at row
             *  @param int $limit: Limit
             *  @param String $result_type: Result type "array" or "object"
             *  
             *  @return filtered rows
             */
            // Query data
            if(!$select){
                $select = '*';
            }
            $this->db->select($select);
            
            // Set up from table
            if(!isset($data['use_view']) || $data['use_view'] === FALSE){
                $this->db->from($this->table);
            }else{
                if(isset($this->view)){
                    $this->db->from($this->view);
                }else{
                    $this->db->from($this->table);
                }
            }
            
            
            // Set up query join table
            if($join_assoc_array){
                foreach($join_assoc_array as $join){
                    $this->db->join($join['table'], $join['condition'], $join['option']);
                }
            }
            
            // Set up where clause
            if($where_assoc){
                $this->db->where($where_assoc);
            }
            
            // Set up query offset
            if($offset != NULL){
                $this->db->offset($offset);
            }
            
            // Set up query limit
            if($limit){
                $this->db->limit($limit);
            }
            
            // Set order result
            if($order){
                $this->db->order_by($order);
            }
            
            // Execute query
            $query = $this->db->get();
            
            //  Get result and return
            return $this->get_result($query, $result_type);
        }
        
    
        function get_filter_single($select='*', $where_assoc=array(), $join_assoc_array=array(), $result_type='object'){
            /*
            *  Get single filtered row
            *  set $this->table before use this function
            *
            *  @param string $select: projections
            *  @param assoc $where_assoc: where clause assoc
            *  
            *  @return a filtered row
            */
            // Query data
            if(!$select){
                $select = '*';
            }
            $this->db->select($select);
            $this->db->from($this->table);
            
            // Set up query join table
            if($join_assoc_array){
                foreach($join_assoc_array as $join){
                    $this->db->join($join['table'], $join['condition'], $join['option']);
                }
            }
            
            // Set up where clause
            if($where_assoc){
                $this->db->where($where_assoc);
            }
           
            // Execute query
            $query = $this->db->get();
           
            // Get result
            $result = $this->get_result($query, $result_type);
            
            // If found any row then return first row
            if($result){
                return $result[0];
            }
            
            // If not return null
            return null;
        }
        
        function add($data_assoc){
            /*
             *  Insert row
             *  @param  assoc   Row data
             *
             *  @return bool    true if success, false if not success
             *  
             */
            
            // Insert data
            $insert_result = $this->db->insert($this->table, $data_assoc);
            
            // return insert result
            return $insert_result;
            
        }
        
        function update($where_assoc, $data_assoc){
            /*
             *  Update rows
             *
             *  @param  assoc   Set rows to be updated
             *  @param  assoc   Update data
             *  
             *  @return bool    TRUE if success, FALSE if not
             */
            
            //  Set update data
            $this->db->set($data_assoc);
            
            //  Set rows to be updated
            $this->db->where($where_assoc);
            
            //  Update
            $update_result = $this->db->update($this->table);
            
            return $update_result;
            
        }
        
        function test(){
            if(isset($this->view)){
                //echo $this->view;
                $this->table = 'view';
            }
            
        }
        
    }
    