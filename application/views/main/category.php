<?php $this->load->view( 'main/inc/head.php'  ); ?>

<body class="header-fixed header-fixed-space-v2">
	<div class="wrapper">
		<?php 
            $this->load->view( 'main/inc/header.php' );
            $this->load->view( 'main/inc/search.php' );
            
            if($project_type_name == "vegetable"){
               $this->load->view( 'main/page/vegetable.php' ); 
            }
            else if($project_type_name=="fruit"){
               $this->load->view( 'main/page/fruit.php' ); 
            }
            else if($project_type_name=="animal"){
               $this->load->view( 'main/page/animal.php' ); 
            }
            
        
            $this->load->view( 'main/inc/footer.php' );
        ?>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/stringResource.js"></script>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/category/projectList.js"></script>
