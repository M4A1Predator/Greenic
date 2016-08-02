<div class="header-v8 header-sticky">
			<!-- Topbar blog -->
			<div class="blog-topbar">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-xs-8 hidden-xs">
							<ul class="topbar-list-contact topbar-log_reg">
								<li>
									<i class="fa fa-envelope"></i> Email: support@greenic.co
								</li>
								<li>
									<i class="fa fa-phone"></i> Hotline: 083 000 9691
								</li>
							</ul>
							
						</div>

                        <?php if(isset($_GET['status'])=="login"){?>
						<div class="col-sm-6 col-xs-12 clearfix text-center">
							<ul class="topbar-list top-log-reg pull-right">
								<li class="home"><a href="<?=base_url()?>mats/userDetail.php?status=login" data-toggle="tooltip" title="คลิกเพื่อแก้ไข้ข้อมูล"><i class="fa fa-user" aria-hidden="true"></i> สวัสดีคุณ: สมปอง</a></li>
								<li class=""><a href="<?=base_url()?>mats/chatMain.php?status=login"><i class="fa fa-comment" aria-hidden="true"></i> กล่องแชท</a></li>
                                <!--เริ่ม..ถ้ามีโปรเจ็ก 1 โปรเจ็คขึ้นไปจึงจะแสดง-->
                                <li class=""><a href="<?=base_url()?>mats/userProject.php?status=login"><i class="fa fa-product-hunt" aria-hidden="true"></i> โปรเจ็คของคุณ</a></li>
                                <!--จบ..ถ้ามีโปรเจ็ก 1 โปรเจ็คขึ้นไปจึงจะแสดง-->
                                <li class=""><a href="<?=base_url()?>mats/addProject.php?status=login"><i class="fa fa-plus" aria-hidden="true"></i> สร้างโปรเจ็ค</a></li>
							</ul>
                            
                            
						</div>
                        <?php }else{?>
                        <div class="col-sm-6 col-xs-12 clearfix text-center">
							<ul class="topbar-list topbar-log_reg pull-right  hidden-xs">
								<li class="cd-log_reg home"><a class="cd-signin" href="<?=base_url()?>mats/javascript:void(0);">เข้าสู่ระบบ</a></li>
								<li class="cd-log_reg"><a class="cd-signup" href="<?=base_url()?>mats/javascript:void(0);">สมัครสมาชิก</a></li>
							</ul>
                            
                            <ul class="topbar-list ct topbar-log_reg hidden-sm hidden-md hidden-lg">
								<li class="cd-log_reg home"><a class="cd-signin" href="<?=base_url()?>mats/javascript:void(0);">เข้าสู่ระบบ</a></li>
								<li class="cd-log_reg"><a class="cd-signup" href="<?=base_url()?>mats/javascript:void(0);">สมัครสมาชิก</a></li>
							</ul>
						</div>
                        <?php }?>
					</div><!--/end row-->
				</div><!--/end container-->
			</div>
			
            <!-- End Topbar blog -->
          
			<!-- Navbar -->
			<?php $this->load->view( 'main/inc/nav.php'); ?>
			<!-- End Navbar -->
		</div>