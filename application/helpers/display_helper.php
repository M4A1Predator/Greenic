<?php
    function display_date($date_text){
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_text);
        echo $date->format('d/m/Y');
    }