<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class GNC_Query {
        
        function get_join_table_assoc($table, $condition, $option=''){
            /*
             *  Get join table assoc to use with get_filter in model
             *
             *  @param String $table    table name
             *  @param String $condition    join condition
             *  @param String $option   join option
             *
             *  @return join assoc
             */
            
            // Create assoc key: table, condition, option
            $join_assoc = array();
            $join_assoc['table'] = $table;
            $join_assoc['condition'] = $condition;
            $join_assoc['option'] = $option;
            
            // return as assoc
            return $join_assoc;
            
        }
        
    }
    
    