<?php include 'inc/head.php'; ?>

<body class="header-fixed header-fixed-space-v2">
	<div class="wrapper">
		<?php 
            $this->load->view('main/inc/header');
            $this->load->view('main/inc/search');
            
            
            $this->load->view('main/page/manageFarmPage'); 
            
            $this->load->view('main/inc/footer.php');
            
        ?>

