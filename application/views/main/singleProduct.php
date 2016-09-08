<?php $this->load->view( 'main/inc/head.php'); ?>

<body class="header-fixed header-fixed-space-v2">
	<div class="wrapper">
		<?php 
            $this->load->view( 'main/inc/header.php');
            
            
            
            
            $this->load->view( 'main/page/singlePage.php'); 
            
            
        
            $this->load->view( 'main/inc/footer.php');
            
        ?>
        
        <!--<script type="text/javascript" src="<?=base_url()?>mats/mainJs/stringResource.js"></script>-->
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/stringResource.js"></script>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/viewProject.js"></script>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/validateHelper.js"></script>
        
        <?php if($is_owner){?>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/updateProject.js"></script>
        <?php } ?>
        
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/follow.js"></script>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/vote.js"></script>
        <!--<script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/voteResult.js"></script>-->
        
