<div class="container content-md">
                    <form action="#" method="post" id="sky-form3" class="sky-form" novalidate="novalidate">
						<header>[1/3] แก้ไขโปรเจ็ค: ผักบุ้งจีน</header>

						<fieldset>
							<section>
								<label class="label"><strong>ชื่อสินค้าของคุณ</strong></label>
								<label class="input">
									<i class="icon-append fa fa-tag"></i>
									<input type="text" name="projectName" id="projectName" value="ผักบุ้งจีน">
								</label>
							</section>
                            <div class="row">
								<section class="col-md-2 col-sm-4">
                                            <label class="label"><strong>ประเภท</strong></label>
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">เลือกประเภท</option>
												<option value="CATED0001" selected="">ผัก</option>
												<option value="CATE0008">ผลไม้</option>
												<option value="CATE0025">สัตว์</option>
											</select>
											<i></i>
										</label>
								</section>
                                <section class="col-md-2 col-sm-4">
                                            <label class="label"><strong>ชนิด</strong> <button class="btn btn-xs rounded btn-success" data-toggle="modal" data-target="#addSubCategory" type="button">เพิ่มใหม่ <i class="fa fa-plus" aria-hidden="true"></i></button></label>
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">เลือกชนิด</option>
												<option value="CATED0001">ผักคะน้า</option>
												<option value="CATE0008" selected="">ผักบุ้ง</option>
												<option value="CATE0025">ถั่วฝักยาว</option>
											</select>
											<i></i>
										</label>
								</section>
                                <section class="col-md-2 col-sm-4">
                                            <label class="label"><strong>สายพันธุ์</strong> <button class="btn btn-xs rounded btn-success" data-toggle="modal" data-target="#addBreed" type="button">เพิ่มใหม่ <i class="fa fa-plus" aria-hidden="true"></i></button></label>
										<label class="select">
											<select name="gender">
												<option value="0" disabled="">เลือกสายพันธุ์</option>
												<option value="CATED0001">ผักบุ้งไทย</option>
												<option value="CATE0008" selected="">ผักบุ้งจีน</option>
												<option value="CATE0025">ผักบุ้งฝรั่ง</option>
                                                <option value="CATE0025">ไม่มีสายพันธุ์</option>
											</select>
											<i></i>
										</label>
								</section>
								<section class="col-md-6">
                                        <label class="label"><strong>ฟาร์มที่ทำ</strong> <button class="btn btn-xs rounded btn-success" data-toggle="modal" data-target="#addFarm" type="button">เพิ่มฟาร์มใหม่ <i class="fa fa-plus" aria-hidden="true"></i></button></label>
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">เลือกฟาร์ม</option>
												<option value="FID0001" selected="">ไร่ชายเขา (อ.เมืองนครนายก จ.นครนายก)</option>
												<option value="FID0008">บ้านไร่คันนา (อ.ปากพลี จ.นครนายก)</option>
												<option value="FID0025">สวนสุขภาพมานีร่า (อ.บ้านนา จ.นครนายก)</option>
											</select>
											<i></i>
										</label>
								</section>
							</div>
							<section>
								<label class="label"><strong>ข้อมูลเกี่ยวกับสินค้า</strong></label>
								<label class="textarea">
									<textarea rows="4" name="projectName" id="projectName">ผักบุ้งจีน เป็นพืชที่อยู่ในวงศ์ผักบุ้ง (Convolvulaceae) มีชื่อทางวิทยาศาสตร์ว่า Ipomoea aquatica Forsk. Var. reptan เป็นพืชที่พบทั่วไปในเขตร้อน และเป็นผักที่คนไทยนิยมนำมาประกอบอาหารเช่นเดียวกับผักบุ้งไทย ผักบุ้งจีนมีใบสีเขียว ก้านใบมีสีเหลืองหรือขาว ก้านดอกและดอกมีสีขาว</textarea>
								</label>
							</section>
                            

                            
						</fieldset>

						<footer>
							<a href="editProject.php?step=2"class="button">ขั้นตอนต่อไป <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
						</footer>

						
					</form>
</div>
<?php $this->load->view( 'main/inc/addProjectModal.php');?>