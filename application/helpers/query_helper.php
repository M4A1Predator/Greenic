<?php

    function get_page_amount($count, $limit){
        // Calculate page amount
        if($count <= $limit){
            $page_amount = 1;
        }else{
            if($count % $limit == 0){
                $page_amount = $count / $limit;
            }else{
                $page_amount = ($count / $limit) + 1;
            }
        }
        
        return $page_amount;
    }
