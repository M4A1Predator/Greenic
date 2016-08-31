<?php $this->load->view( 'main/inc/head.php'); ?>

<body class="header-fixed header-fixed-space-v2">
	<div class="wrapper">
		<?php 
            $this->load->view( 'main/inc/header.php');
            $this->load->view( 'main/inc/search.php');
        
            $this->load->view( 'main/page/main.php');
        
            $this->load->view( 'main/inc/footer.php');
            
        ?>
    
    <script type="text/javascript" src="<?=base_url()?>mats/mainJs/stringResource.js"></script>
    
    <script type="text/javascript" src="<?=base_url()?>mats/mainJs/home/home.js"></script>
    
    <script type="text/javascript" src="<?=base_url()?>mats/mainJs/regis.js"></script>
    
