	   <div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">โปรเจ็คเกษตรอินทรีย์ทั้งหมดา</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="index.php">หน้าแรก</a></li>
					<li class="active">เกษตรกรทั้งหมด</li>
				</ul>
			</div>
		</div>
        <div class="container content-md">
           
            <div class="headline-center">
					<h2>เกษตรกรทั้งหมด</h2>
				</div>
			     <div class="container content profile">
                <div class="row">
				<!-- Profile Content -->
					<div class="profile-body margin-bottom-20">
						<!--Profile Blog-->
                        <?php // for($i=0;$i<8;$i++){?>
                        
						<div class="row margin-bottom-20">
                            <?php foreach($farmers as $farmer){?>
                            <?php
                                $address = '';
                                if($farmer->member_district){
                                    $address .= $farmer->member_district;
                                }
                                
                                if($farmer->member_province){
                                    $address .= ', '.$farmer->member_province;
                                }
                                
                                $profile_image = $farmer->member_img_path;
                                if(!$profile_image){
                                    $profile_image = get_default_member_image_path();
                                }
                                
                            ?>
							<div class="col-sm-6 sm-margin-bottom-20">
								<div class="profile-blog">
									<img class="rounded-x" src="<?=base_url().$profile_image?>" alt="">
									<div class="name-location">
										<strong><?=$farmer->member_firstname.' '.$farmer->member_lastname?></strong>
                                        <?php if($address){ ?>
										<span><i class="fa fa-map-marker"></i><?=$address?></span>
                                        <?php } ?>
									</div>
									<div class="clearfix margin-bottom-20"></div>
									<!--<p>สวัสดีครับผมชื่อสมปอง เป็นเกษตรกรยุคใหม่ ผมใส่ใจทุกรายละเอียดการเลี้ยงดูผักเพื่อให้ได้ผลผลิตที่มีคุณค่าแก่ผู้บริโภคมากที่สุด แปลงผักของผมจะไม่ใช้สารเคมีเลยแม้แต่น้อย จึงทำให้ทุกคนมั่นใจได้ว่าได้ผักที่มีคุณค่าไป</p>-->
									<hr>
									<ul class="list-inline share-list">
										<li><i class="fa fa-star"></i><a>120 คะแนน</a></li>
										<li><i class="fa fa-leaf"></i><a href="#"><?=$farmer->project_count?> โปรเจ็ค</a></li>
										<li><i class="fa fa-comment"></i><a href="#">20 ความคิดเห็น</a></li>
									</ul>
								</div>
							</div>
                            <?php }?>
							<!--<div class="col-sm-6">-->
							<!--	<div class="profile-blog">-->
							<!--		<img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img2.jpg" alt="">-->
							<!--		<div class="name-location">-->
							<!--			<strong>สมปอง มุ่งทำกิน</strong>-->
							<!--			<span><i class="fa fa-map-marker"></i><a href="#">ปากพลี,</a> <a href="#">นครนายก</a></span>-->
							<!--		</div>-->
							<!--		<div class="clearfix margin-bottom-20"></div>-->
							<!--		<p>สวัสดีครับผมชื่อสมปอง เป็นเกษตรกรยุคใหม่ ผมใส่ใจทุกรายละเอียดการเลี้ยงดูผักเพื่อให้ได้ผลผลิตที่มีคุณค่าแก่ผู้บริโภคมากที่สุด แปลงผักของผมจะไม่ใช้สารเคมีเลยแม้แต่น้อย จึงทำให้ทุกคนมั่นใจได้ว่าได้ผักที่มีคุณค่าไป</p>-->
							<!--		<hr>-->
							<!--		<ul class="list-inline share-list">-->
							<!--			<li><i class="fa fa-star"></i><a href="#">120 คะแนน</a></li>-->
							<!--			<li><i class="fa fa-leaf"></i><a href="#">12 โปรเจ็ค</a></li>-->
							<!--			<li><i class="fa fa-comment"></i><a href="#">20 ความคิดเห็น</a></li>-->
							<!--		</ul>-->
							<!--	</div>-->
							<!--</div>-->
						</div>
                        <!--/end row-->
                        
						<!--End Profile Blog-->
					</div>
                </div>
				<!-- End Profile Content -->
		</div>
            <div class="text-center">
                <ul class="pagination">
                    <?php for($i=1;$i<=$page_amount;$i++){ ?>
                    <?php
                    $class = '';
                    if($page == $i){
                        $class = "active";
                    } ?>
                    <li  class="<?=$class?>" ><a href="<?=base_url().'all_farmers?p='.$i?>"><?=$i?></a></li>
                    <?php } ?>
<!--                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">»</a></li>-->
                </ul>
            </div>
             
		</div>
       