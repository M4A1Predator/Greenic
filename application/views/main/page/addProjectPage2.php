<div class="container content-md">
                    <form action="#" method="post" id="sky-form3" class="sky-form" novalidate="novalidate">
						<header>[2/3] สร้างโปรเจ็คเกษตรอินทรีย์</header>

						<fieldset>

                            <div class="row">
								<section class="col-md-2 col-sm-4">
                                            <label class="label"><strong>หน่วยที่ขาย</strong> <button class="btn btn-xs rounded btn-success" data-toggle="modal" data-target="#addUnit" type="button">เพิ่มใหม่ <i class="fa fa-plus" aria-hidden="true"></i></button></label>
										<label class="select">
											<select name="select_unit" id="select_unit">
												<option value="0" selected="" disabled="">เลือกหน่วย</option>
												<option value="CATED0001">กรัม</option>
												<option value="CATE0008">กิโลกรัม</option>
												<option value="CATE0025">ตัน</option>
											</select>
											<i></i>
										</label>
								</section>
                                <section class="col-md-2 col-sm-4">
                                        <label class="label"><strong>ราคาต่อ <span class="pUnit" style="color:red">กิโลกรัม</span></strong></label>
										<label class="input">
											<input type="text" name="price" id="ppu" placeholder="1,000">
										</label>
								</section>
                                <section class="col-md-2 col-sm-4">
                                        <label class="label"><strong>กำลังผลิต <span class="pUnit" style="color:red">กิโลกรัม</span></strong></label>
										<label class="input">
											<input type="text" name="productivity" id="quantity" placeholder="500">
										</label>
								</section>
								<section class="col-md-2 col-sm-4">
                                        <label class="label"><strong>สั่งซื้อขั้นต่ำ <span class="pUnit" style="color:red">กิโลกรัม</span></strong></label>
										<label class="input">
											<input type="text" name="minOrder" id="lowest_order" placeholder="10">
										</label>
								</section>
                                <section class="col-md-2 col-sm-4">
                                        <label class="label"><strong>วันที่เริ่มทำ</strong></label>
										<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" name="date" id="startDate" placeholder="เช่น 10/05/2559" class="hasDatepicker">
									</label>
								</section>
                                <section class="col-md-4 col-sm-8">
                                        <label class="label"><strong>วันที่พร้อมจำหน่าย <span style="color:red">(โดยประมาณ)</span></strong></label>
										<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" name="date" id="sell_date" placeholder="เช่น 10/05/2559" class="hasDatepicker">
									</label>
								</section>
							</div>
                            <section>
								<label class="label"><strong>ช่องทางการจัดส่ง</strong></label>
								<div class="inline-group">
                                    <?php foreach($shipment_arr as $shipment){ ?>
                                    <label class="checkbox"><input type="checkbox" class="shipmentWay" name="smw-<?=$shipment['shipment_id']?>"><i></i><?=$shipment['shipment_name']?></label>
                                    <?php } ?>
                                    
<!--									<label class="checkbox"><input type="checkbox" id="ems" class="shipmentWay" name=""><i></i>ไปรษณีย์ไทย</label>-->
<!--									<label class="checkbox"><input type="checkbox" class="shipmentWay" name="checkbox-inline"><i></i>kerry express</label>-->
<!--                                    <label class="checkbox"><input type="checkbox" class="shipmentWay" name="checkbox-inline"><i></i>จัดส่งเองถึงที่</label>-->
<!--									<label class="checkbox"><input type="checkbox" class="shipmentWay" name="checkbox-inline"><i></i>บริษัทขนส่งเอกชนอื่นๆ</label>-->
<!--                                    <label class="checkbox"><input type="checkbox" class="shipmentWay" name="checkbox-inline"><i></i>ตามตกลง</label>-->
<!--                                    <label class="checkbox"><input type="checkbox" class="shipmentWay" name="checkbox-inline"><i></i>มารับเอง</label>-->
								</div>
							</section>
                            
						</fieldset>

						<footer>
							<a href="#" id="add_project2_btn" class="button">ขั้นตอนต่อไป <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
						</footer>


					</form>
</div>
<?php $this->load->view( 'main/inc/addProjectModal.php');?>