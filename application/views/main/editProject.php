<?php $this->load->view( 'main/inc/head.php'); ?>

<body class="header-fixed header-fixed-space-v2">
	<div class="wrapper">
		<?php 
            $this->load->view( 'main/inc/header.php');
            $this->load->view( 'main/inc/search.php');
        
             if(isset($_GET['step'])){
                 $step=$_GET['step'];
             }else{
                 $step="no";
             }
            
            if($step==1){
                $this->load->view( 'main/page/editProjectPage1.php'); 
            }else if($step==2){
                $this->load->view( 'main/page/editProjectPage2.php'); 
            }else if($step==3){
                $this->load->view( 'main/page/editProjectPage3.php'); 
            }else{
                $this->load->view( 'main/page/editProjectPage1.php'); 
            }
        
            $this->load->view( 'main/inc/footer.php');
            
        ?>

