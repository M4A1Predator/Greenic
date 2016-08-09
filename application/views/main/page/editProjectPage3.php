<div class="container content-md">
                    <form action="#" method="post" id="sky-form3" class="sky-form" novalidate="novalidate">
						<header>[3/3] แก้ไขโปรเจ็ค: ผักบุ้งจีน</header>

						<fieldset>

                            <div class="row">
								
								<section class="col col-6">
									<label class="label"><strong>รูปประกอบ (รูปหลัก 1 รูป)</strong></label>
									<section>
                                        <label for="file" class="input input-file state-success">
                                            <div class="button state-success"><input type="file" name="file" multiple="" onchange="this.parentNode.nextSibling.value = this.value" class="valid">เลือกไฟล์</div><input type="text" placeholder="กรุณาเลือกไฟล์" readonly="" class="valid">
                                        </label>*เว้นไว้ถ้าไม่ต้องการเปลี่ยนรูป
                                    </section>
                                </section>
                                <section class="col col-6">
                                    <label class="label"><strong>กรอกข้อความที่เห็นในภาพ</strong></label>
                                    <label class="input input-captcha">
                                        <img src="<?=base_url()?>mats/assets/plugins/sky-forms-pro/skyforms/captcha/image.php?&lt;?php echo time(); ?&gt;" width="100" height="32" alt="Captcha image">
                                        <input type="text" maxlength="6" name="captcha" id="captcha">
                                    </label>
                                </section>
							
							</div>
							

							<section>
								<label class="checkbox"><input type="checkbox" name="agree"><i></i>ยอมรับเงื่อนไงและข้อตกลงของ Greenic</label>
                                <small><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> คลิกอ่านที่นี่เพื่ออ่านเงื่อนไขและข้อตกลงของ Greenic</a></small>
							</section>
                            
						</fieldset>

						<footer>
							<button type="submit" class="button">สร้างโปรเจ็ค <i class="fa fa-plus" aria-hidden="true"></i></button>
						</footer>

						<div class="message">
							<i class="rounded-x fa fa-check"></i>
							<p>สร้างโปรเจ็คเรียบร้อยแล้ว!</p>
						</div>
					</form>
</div>
<?php $this->load->view( 'main/inc/addProjectModal.php');?>