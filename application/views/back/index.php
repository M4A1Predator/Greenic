<?php include 'include/header.php';?>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <?php include 'include/headbar.php';?>
                <?php include 'include/sidebar.php';?>
                
                <!--Content-->
                    <?php 
                        if(isset($_GET['page'])){
                            $page=$_GET['page'];
                            include 'pages/'.$page.'.php';
                        }
                        else{
                            include 'pages/main.php';
                        }
                    ?>
                <!--Content-->
                
            <?php include 'include/footer.php';?>
           </div>
        </div>
            <?php include 'include/footer-js.php';?>
    </body>

</html>