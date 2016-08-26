<?php
    function display_date($date_text){
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_text);
        echo $date->format('d/m/Y');
    }
    
    function get_project_type_thai_text($project_type_id){
        
        $type_arr = ['ผัก', 'ผลไม้', 'สัตว์'];
        
        return $type_arr[$project_type_id - 1];
        
    }