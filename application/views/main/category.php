<?php $this->load->view( 'main/inc/head.php'  ); ?>

<body class="header-fixed header-fixed-space-v2">
	<div class="wrapper">
		<?php 
            $this->load->view( 'main/inc/header.php' );
            $this->load->view( 'main/inc/search.php' );
            
            $name=$_GET['name'];
            if($name=="vegetable"){
               $this->load->view( 'main/page/vegetable.php' ); 
            }
            elseif($name=="fruit"){
               $this->load->view( 'main/page/fruit.php' ); 
            }
            elseif($name=="animal"){
               $this->load->view( 'main/page/animal.php' ); 
            }
            
        
            $this->load->view( 'main/inc/footer.php' );
            
        ?>

