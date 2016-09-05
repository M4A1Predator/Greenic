<?php $this->load->view( 'main/inc/head.php'  ); ?>

<body class="header-fixed header-fixed-space-v2">
	<div class="wrapper">
		<?php 
            $this->load->view( 'main/inc/header.php' );
            $this->load->view( 'main/inc/search.php' );
            
            if($project_type_name == "vegetable"){
               
            }
            else if($project_type_name=="fruit"){
               
            }
            else if($project_type_name=="animal"){
               
            }
            $this->load->view( 'main/page/categoryPage.php' );
        
            $this->load->view( 'main/inc/footer.php' );
        ?>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/stringResource.js"></script>
        <!--<script type="text/javascript" src="<?=base_url()?>mats/mainJs/category/projectList.js"></script>-->
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/category/category.js"></script>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/category/projectTypeMenu.js"></script>
