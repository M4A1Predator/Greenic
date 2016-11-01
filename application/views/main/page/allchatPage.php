<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left">รายชื่อที่สนทนา</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.php">หน้าแรก</a></li>
            <li class="active">รายชื่อที่สนทนา</li>
        </ul>
    </div>
</div>

<input type="hidden" id="memberId" value="<?=$this->session->userdata('member_id')?>" />

<div class="container content-md">
    <div class="col-md-6">
        <div class="panel margin-bottom-40">
            <table class="table table-striped chatList">
                <tbody id="conversationRow">

                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
                    <div class="panel margin-bottom-40">
								<table class="table table-striped chatList">
									<tbody>
<!--										<tr onclick="window.document.location='chatMessage.php#1';">-->
<!--											<td class="chatProfile"><img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img1.jpg" alt=""></td>-->
<!--											<td><a>สมปอง มุ่งทำกิน</a><br><small class="chatName"><i class="fa fa-map-marker" aria-hidden="true"></i> ฟาร์มบ้านไร่ชายตวัน</small></td>-->
<!--											<td><button class="btn btn-default btn-xs"><i class="fa fa-clock-o"></i> 5:10pm</button></td>-->
<!--										</tr>-->
<!--										<tr onclick="window.document.location='chatMessage.php#2';">-->
<!--											<td class="chatProfile"><img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img2.jpg" alt=""></td>-->
<!--											<td><a>สมหมาย ปลูกผัก</a><br><small class="chatName"><i class="fa fa-map-marker" aria-hidden="true"></i> ฟาร์มบ้านไร่ชายตวัน</small></td>-->
<!--											<td><button class="btn btn-default btn-xs"><i class="fa fa-clock-o"></i> 5:10pm</button></td>-->
<!--										</tr>-->
<!--										<tr onclick="window.document.location='chatMessage.php#3';">-->
<!--											<td class="chatProfile"><img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img3.jpg" alt=""></td>-->
<!--											<td><a>สมศรี มีเงินทอง</a><br><small class="chatName"><i class="fa fa-map-marker" aria-hidden="true"></i> ฟาร์มบ้านไร่ชายตวัน</small></td>-->
<!--											<td><button class="btn btn-default btn-xs"><i class="fa fa-clock-o"></i> 5:10pm</button></td>-->
<!--										</tr>-->
<!--										<tr onclick="window.document.location='chatMessage.php#4';">-->
<!--											<td class="chatProfile"><img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img4.jpg" alt=""></td>-->
<!--											<td><a>สมาน สานสกลุ</a><br><small class="chatName"><i class="fa fa-map-marker" aria-hidden="true"></i> ฟาร์มบ้านไร่ชายตวัน</small></td>-->
<!--											<td><button class="btn btn-default btn-xs"><i class="fa fa-clock-o"></i> 5:10pm</button></td>-->
<!--										</tr>-->
<!--                                        <tr onclick="window.document.location='chatMessage.php#1';">-->
<!--											<td class="chatProfile"><img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img1.jpg" alt=""></td>-->
<!--											<td><a>สมปอง มุ่งทำกิน</a><br><small class="chatName"><i class="fa fa-map-marker" aria-hidden="true"></i> ฟาร์มบ้านไร่ชายตวัน</small></td>-->
<!--											<td><button class="btn btn-default btn-xs"><i class="fa fa-clock-o"></i> 5:10pm</button></td>-->
<!--										</tr>-->
<!--										<tr onclick="window.document.location='chatMessage.php#2';">-->
<!--											<td class="chatProfile"><img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img2.jpg" alt=""></td>-->
<!--											<td><a>สมหมาย ปลูกผัก</a><br><small class="chatName"><i class="fa fa-map-marker" aria-hidden="true"></i> ฟาร์มบ้านไร่ชายตวัน</small></td>-->
<!--											<td><button class="btn btn-default btn-xs"><i class="fa fa-clock-o"></i> 5:10pm</button></td>-->
<!--										</tr>-->
<!--										<tr onclick="window.document.location='chatMessage.php#3';">-->
<!--											<td class="chatProfile"><img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img3.jpg" alt=""></td>-->
<!--											<td><a>สมศรี มีเงินทอง</a><br><small class="chatName"><i class="fa fa-map-marker" aria-hidden="true"></i> ฟาร์มบ้านไร่ชายตวัน</small></td>-->
<!--											<td><button class="btn btn-default btn-xs"><i class="fa fa-clock-o"></i> 5:10pm</button></td>-->
<!--										</tr>-->
<!--										<tr onclick="window.document.location='chatMessage.php#4';">-->
<!--											<td class="chatProfile"><img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img4.jpg" alt=""></td>-->
<!--											<td><a>สมาน สานสกลุ</a><br><small class="chatName"><i class="fa fa-map-marker" aria-hidden="true"></i> ฟาร์มบ้านไร่ชายตวัน</small></td>-->
<!--											<td><button class="btn btn-default btn-xs"><i class="fa fa-clock-o"></i> 5:10pm</button></td>-->
<!--										</tr>-->
									</tbody>
								</table>
							</div>
                </div>
                </div>
<div style="clear:both;"></div>