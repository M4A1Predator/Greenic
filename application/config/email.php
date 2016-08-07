<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // email config
    //*** USE GOOGLE SMTP server
    //*** MUST BE GMAIL
    $config['protocol'] = 'smtp';
    $config['mailpath'] = 'stuff/email/';
    $config['smtp_host'] = 'ssl://smtp.googlemail.com'; //google smtp server
    $config['smtp_port'] = '465';
    $config['smtp_user'] = 'predatorkpop@gmail.com'; //email
    $config['smtp_pass'] = 'mlgm4m40noscope';
    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';
    $config['wordwrap'] = TRUE;