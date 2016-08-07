<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    function print_assoc($assoc){
        /*
         *  Print associative array
         *  Key => value
         *
         *  @param  assoc   associative array
         *
         *  @return void
         *  
         */
        
        // Check if assoc is null then return null
        if(!$assoc or !is_array($assoc)){
            return;
        }
        
        // Check is assoc
        // Get key of array
        $keys = array_keys($assoc);
        // Get key of array_keys
        $keys_of_keys = array_keys($keys);
        
        // If keys and keys of array is not the same, means it is assoc
        // e.g. array(a, b) array_keys must be [0, 1], so keys of array_keys would be [0, 1]
        // if assoc(a=>1, b=>2) array_keys must be [a, b], so keys of array_keys would be [0, 1]
        $is_assoc = $keys !== $keys_of_keys;
        if(!$is_assoc){
            echo var_dump($assoc).'<br/>';
            return;
        }
        
        // Echo key and value
        foreach($assoc as $key => $value){
            echo $key.' => '.$value.'<br/>';
        }
        
    }
    