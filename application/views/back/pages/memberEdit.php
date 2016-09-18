<article class="content forms-page">
                    <div class="title-block">
                        <h3 class="title">แก้ไขข้อมูลสมาชิก</h3>
                    </div>
                    
                    <?php foreach($member_detail as $detail){ ?>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-block sameheight-item">
                                    <form>
                                        <div class="form-group"> <label class="control-label">สถานะสมาชิก</label>
                                            <div>
                                                            
                                                <!--สลับ checked และ disabled-->
                                               <?php  $mem_type_id='1';
                                               if($detail->member_type_id ==$mem_type_id) {?> 
                                                <label>
                                                    <input class="radio squared" name="squared-radios" type="radio" checked="checked" >
                                                    <span>สมาชิกทั่วไป</span>
                                                </label> 
                                                <label>
                                                    <input class="radio squared" name="squared-radios"  type="radio" disabled>
                                                    <span>เกษตรกร</span>
                                                </label>
                                                
                                                <?php }else {?>
                                                <label>
                                                    <input class="radio squared" name="squared-radios" type="radio" disabled>
                                                    <span>สมาชิกทั่วไป</span>
                                                </label> 
                                                <label>
                                                    <input class="radio squared" name="squared-radios" checked="checked" type="radio">
                                                    <span>เกษตรกร</span>
                                                </label>
                                                
                                                
                                                
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6"><label class="control-label">ชื่อ</label> <input type="text" class="form-control boxed" value=" <?=$detail->member_firstname?>"></div>
                                            <div class="col-xs-6"><label class="control-label">นามสกุล</label> <input type="text" class="form-control boxed" value="<?=$detail->member_lastname?>"></div>
                                        </div>
                                        <div class="form-group"><label class="control-label">ที่อยู่</label> <input type="text" class="form-control boxed" value="<?=$detail->member_address?>"></div>
                                         <div class="form-group row">
                                            <div class="col-sm-4"><label class="control-label">จังหวัด</label>
                                                <select class="form-control province">
                                                           <option>เลือกจังหวัด</option>
                                                            <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                                          <option value="กระบี่">กระบี่ </option>
                                                          <option value="กาญจนบุรี">กาญจนบุรี </option>
                                                          <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                                          <option value="กำแพงเพชร">กำแพงเพชร </option>
                                                          <option value="ขอนแก่น">ขอนแก่น</option>
                                                          <option value="จันทบุรี">จันทบุรี</option>
                                                          <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                                                          <option value="ชัยนาท">ชัยนาท </option>
                                                          <option value="ชัยภูมิ">ชัยภูมิ </option>
                                                          <option value="ชุมพร">ชุมพร </option>
                                                          <option value="ชลบุรี">ชลบุรี </option>
                                                          <option value="เชียงใหม่">เชียงใหม่ </option>
                                                          <option value="เชียงราย">เชียงราย </option>
                                                          <option value="ตรัง">ตรัง </option>
                                                          <option value="ตราด">ตราด </option>
                                                          <option value="ตาก">ตาก </option>
                                                          <option value="นครนายก" selected="">นครนายก </option>
                                                          <option value="นครปฐม">นครปฐม </option>
                                                          <option value="นครพนม">นครพนม </option>
                                                          <option value="นครราชสีมา">นครราชสีมา </option>
                                                          <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                                          <option value="นครสวรรค์">นครสวรรค์ </option>
                                                          <option value="นราธิวาส">นราธิวาส </option>
                                                          <option value="น่าน">น่าน </option>
                                                          <option value="นนทบุรี">นนทบุรี </option>
                                                          <option value="บึงกาฬ">บึงกาฬ</option>
                                                          <option value="บุรีรัมย์">บุรีรัมย์</option>
                                                          <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                                          <option value="ปทุมธานี">ปทุมธานี </option>
                                                          <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                                          <option value="ปัตตานี">ปัตตานี </option>
                                                          <option value="พะเยา">พะเยา </option>
                                                          <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                                          <option value="พังงา">พังงา </option>
                                                          <option value="พิจิตร">พิจิตร </option>
                                                          <option value="พิษณุโลก">พิษณุโลก </option>
                                                          <option value="เพชรบุรี">เพชรบุรี </option>
                                                          <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                                          <option value="แพร่">แพร่ </option>
                                                          <option value="พัทลุง">พัทลุง </option>
                                                          <option value="ภูเก็ต">ภูเก็ต </option>
                                                          <option value="มหาสารคาม">มหาสารคาม </option>
                                                          <option value="มุกดาหาร">มุกดาหาร </option>
                                                          <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                                          <option value="ยโสธร">ยโสธร </option>
                                                          <option value="ยะลา">ยะลา </option>
                                                          <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                                          <option value="ระนอง">ระนอง </option>
                                                          <option value="ระยอง">ระยอง </option>
                                                          <option value="ราชบุรี">ราชบุรี</option>
                                                          <option value="ลพบุรี">ลพบุรี </option>
                                                          <option value="ลำปาง">ลำปาง </option>
                                                          <option value="ลำพูน">ลำพูน </option>
                                                          <option value="เลย">เลย </option>
                                                          <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                                          <option value="สกลนคร">สกลนคร</option>
                                                          <option value="สงขลา">สงขลา </option>
                                                          <option value="สมุทรสาคร">สมุทรสาคร </option>
                                                          <option value="สมุทรปราการ">สมุทรปราการ </option>
                                                          <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                                          <option value="สระแก้ว">สระแก้ว </option>
                                                          <option value="สระบุรี">สระบุรี </option>
                                                          <option value="สิงห์บุรี">สิงห์บุรี </option>
                                                          <option value="สุโขทัย">สุโขทัย </option>
                                                          <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                                          <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                                          <option value="สุรินทร์">สุรินทร์ </option>
                                                          <option value="สตูล">สตูล </option>
                                                          <option value="หนองคาย">หนองคาย </option>
                                                          <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                                          <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                                          <option value="อุดรธานี">อุดรธานี </option>
                                                          <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                                          <option value="อุทัยธานี">อุทัยธานี </option>
                                                          <option value="อุบลราชธานี">อุบลราชธานี</option>
                                                          <option value="อ่างทอง">อ่างทอง </option>
                                                          <option value="อื่นๆ">อื่นๆ</option>
                                                        </select>
                                            </div>
                                            <div class="col-sm-4"><label class="control-label">อำเภอ</label>
                                                <select class="form-control district">
                                                       <option>เลือกอำเภอ</option>
                                                        <option value="องครักษ์">องครักษ์</option>
                                                        <option value="านนา">บ้านนา</option>
                                                        <option value="ปากพลี">ปากพลี</option>
                                                        <option value="เมืองนครนายก" selected="">เมืองนครนายก</option>
                                                    </select>
                                            </div>
                                            <div class="col-sm-4"><label class="control-label">ตำบล</label>
                                                <select class="form-control district">
                                                       <option>เลือกตำบล</option>
                                                        <option value="ท่าช้าง">ท่าช้าง</option>
                                                        <option value="บ้านใหญ่">บ้านใหญ่</option>
                                                        <option value="วังกระโจม" selected="">วังกระโจม</option>
                                                        <option value="ท่าทราย">ท่าทราย</option>
                                                        <option value="ดอนยอ">ดอนยอ</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6"><label class="control-label">อีเมล์</label> <input type="mail" class="form-control boxed" value="<?=$detail->member_email?>"></div>
                                            <div class="col-xs-6"><label class="control-label">เบอร์โทร</label> <input type="tel" class="form-control boxed" value="0830009691"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>ภาพประจำตัว</label><?php if($detail->member_img_path){ ?> <br/>  <img src="<?=$detail->member_img_path?>" class="img-responsive"> <br/>  <?php } else{echo" : -";}?>
                                              <br/>           * ไม่ต้องอัพโหลดภาพ ถ้าหากไม่ต้องการเปลี่ยนภาพหน้าปก<br/> 
                                            <input type="file" class="form-control">
                                            
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6"><label class="control-label">รหัสผ่านใหม่</label> <input type="password" class="form-control boxed" placeholder="เว้นไว้หากไม่ต้องการตั้งรหัสใหม่"></div>
                                            <div class="col-xs-6"><label class="control-label">ยืนยันรหัสผ่านอีกครั้ง</label> <input type="password" class="form-control boxed" placeholder="เว้นไว้หากไม่ต้องการตั้งรหัสใหม่"></div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
                                            <button type="button" class="btn btn-danger"><i class="fa fa-times"></i> ยกเลิก</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
            </div>
            </section>
             <?php } ?>
            
            </article>
            