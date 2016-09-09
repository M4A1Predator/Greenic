<?php $this->load->view( 'main/inc/head.php' ); ?>

<body class="header-fixed header-fixed-space-v2">
	<div class="wrapper">
		<?php 
            $this->load->view( 'main/inc/header.php' );
            $this->load->view( 'main/inc/search.php' );
            
            if($step=='step1'){
                $this->load->view( 'main/page/addProjectPage1.php' ); 
            }else if($step=='step2'){
                $this->load->view( 'main/page/addProjectPage2.php' ); 
            }else if($step=='step3'){
                $this->load->view( 'main/page/addProjectPage3.php' ); 
            }else{
                $this->load->view( 'main/page/addProjectPage1.php' ); 
            }
        
            $this->load->view( 'main/inc/footer.php' );
            
        ?>
        
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/stringResource.js"></script>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/validateHelper.js"></script>
        
        <?php if($step=='step1'){?>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/stringResource.js"></script>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/addProject1.js"></script>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/addCategory.js"></script>
        
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/addFarm.js"></script>
        <?php }else if($step=='step2'){ ?>
            <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/addProject2.js"></script>
            <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/addUnit.js"></script>
        <?php }else if($step=='step3'){ ?>
            <script type="text/javascript" src="<?=base_url()?>mats/mainJs/project/addProject3.js"></script>
        <?php } ?>
        
        
        
        
