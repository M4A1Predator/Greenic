<div class="container content-md">
    <form action="#" method="post" id="sky-form3" class="sky-form" novalidate="novalidate">
        <header>ข้อมูลส่วนตัว</header>

        <fieldset>
            <div class="row">
                <section class="col-md-6 col-sm-6">
                    <label class="label"><strong>ชื่อ*</strong></label>
                    <label class="input">
                        <input type="text" name="projectName" id="edit-firstname" value="<?=$member->member_firstname?>">
                    </label>
                </section>
                <section class="col-md-6 col-sm-6">
                    <label class="label"><strong>นาสกุล*</strong></label>
                    <label class="input">
                        <input type="text" name="projectName" id="edit-lastname" value="<?=$member->member_lastname?>">
                    </label>
                </section>
            </div>
            <div class="row">
                <section class="col-md-6">
                        <label class="label"><strong>ที่อยู่*</strong></label>
                        <label class="input">
                        <input type="text" name="projectName" id="edit-address" placeholder="บ้านเลขที่ หมู่ที่ ซอย" value="<?=$member->member_address?>">
                    </label>
                </section>
                <section class="col-md-2 col-sm-4">
                        <label class="label"><strong>จังหวัด*</strong></label>
                            <label class="select">
                                <select class="form-control province" id="edit-province">
                                    <?php if($member->member_province){ ?>
                                    <option value="$member->member_province"><?=$member->member_province?></option>
                                    <?php }else{ ?>
                                    <option>เลือกจังหวัด</option>
                                    <?php }?>
                                    <?php foreach($province_arr as $province){ ?>
                                    <option value="<?=$province->province_id?>"><?=$province->province_name?></option>
                                    <?php  } ?>
                                    <!--<option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>-->
                                    <!--<option value="กระบี่">กระบี่ </option>-->
                                    <!--<option value="กาญจนบุรี">กาญจนบุรี </option>-->
                                    <!--<option value="กาฬสินธุ์">กาฬสินธุ์ </option>-->
                                    <!--<option value="กำแพงเพชร">กำแพงเพชร </option>-->
                                    <!--<option value="ขอนแก่น">ขอนแก่น</option>-->
                                    <!--<option value="จันทบุรี">จันทบุรี</option>-->
                                    <!--<option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>-->
                                    <!--<option value="ชัยนาท">ชัยนาท </option>-->
                                    <!--<option value="ชัยภูมิ">ชัยภูมิ </option>-->
                                    <!--<option value="ชุมพร">ชุมพร </option>-->
                                    <!--<option value="ชลบุรี">ชลบุรี </option>-->
                                    <!--<option value="เชียงใหม่">เชียงใหม่ </option>-->
                                    <!--<option value="เชียงราย">เชียงราย </option>-->
                                    <!--<option value="ตรัง">ตรัง </option>-->
                                    <!--<option value="ตราด">ตราด </option>-->
                                    <!--<option value="ตาก">ตาก </option>-->
                                    <!--<option value="นครนายก">นครนายก </option>-->
                                    <!--<option value="นครปฐม">นครปฐม </option>-->
                                    <!--<option value="นครพนม">นครพนม </option>-->
                                    <!--<option value="นครราชสีมา">นครราชสีมา </option>-->
                                    <!--<option value="นครศรีธรรมราช">นครศรีธรรมราช </option>-->
                                    <!--<option value="นครสวรรค์">นครสวรรค์ </option>-->
                                    <!--<option value="นราธิวาส">นราธิวาส </option>-->
                                    <!--<option value="น่าน">น่าน </option>-->
                                    <!--<option value="นนทบุรี">นนทบุรี </option>-->
                                    <!--<option value="บึงกาฬ">บึงกาฬ</option>-->
                                    <!--<option value="บุรีรัมย์">บุรีรัมย์</option>-->
                                    <!--<option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>-->
                                    <!--<option value="ปทุมธานี">ปทุมธานี </option>-->
                                    <!--<option value="ปราจีนบุรี">ปราจีนบุรี </option>-->
                                    <!--<option value="ปัตตานี">ปัตตานี </option>-->
                                    <!--<option value="พะเยา">พะเยา </option>-->
                                    <!--<option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>-->
                                    <!--<option value="พังงา">พังงา </option>-->
                                    <!--<option value="พิจิตร">พิจิตร </option>-->
                                    <!--<option value="พิษณุโลก">พิษณุโลก </option>-->
                                    <!--<option value="เพชรบุรี">เพชรบุรี </option>-->
                                    <!--<option value="เพชรบูรณ์">เพชรบูรณ์ </option>-->
                                    <!--<option value="แพร่">แพร่ </option>-->
                                    <!--<option value="พัทลุง">พัทลุง </option>-->
                                    <!--<option value="ภูเก็ต">ภูเก็ต </option>-->
                                    <!--<option value="มหาสารคาม">มหาสารคาม </option>-->
                                    <!--<option value="มุกดาหาร">มุกดาหาร </option>-->
                                    <!--<option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>-->
                                    <!--<option value="ยโสธร">ยโสธร </option>-->
                                    <!--<option value="ยะลา">ยะลา </option>-->
                                    <!--<option value="ร้อยเอ็ด">ร้อยเอ็ด </option>-->
                                    <!--<option value="ระนอง">ระนอง </option>-->
                                    <!--<option value="ระยอง">ระยอง </option>-->
                                    <!--<option value="ราชบุรี">ราชบุรี</option>-->
                                    <!--<option value="ลพบุรี">ลพบุรี </option>-->
                                    <!--<option value="ลำปาง">ลำปาง </option>-->
                                    <!--<option value="ลำพูน">ลำพูน </option>-->
                                    <!--<option value="เลย">เลย </option>-->
                                    <!--<option value="ศรีสะเกษ">ศรีสะเกษ</option>-->
                                    <!--<option value="สกลนคร">สกลนคร</option>-->
                                    <!--<option value="สงขลา">สงขลา </option>-->
                                    <!--<option value="สมุทรสาคร">สมุทรสาคร </option>-->
                                    <!--<option value="สมุทรปราการ">สมุทรปราการ </option>-->
                                    <!--<option value="สมุทรสงคราม">สมุทรสงคราม </option>-->
                                    <!--<option value="สระแก้ว">สระแก้ว </option>-->
                                    <!--<option value="สระบุรี">สระบุรี </option>-->
                                    <!--<option value="สิงห์บุรี">สิงห์บุรี </option>-->
                                    <!--<option value="สุโขทัย">สุโขทัย </option>-->
                                    <!--<option value="สุพรรณบุรี">สุพรรณบุรี </option>-->
                                    <!--<option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>-->
                                    <!--<option value="สุรินทร์">สุรินทร์ </option>-->
                                    <!--<option value="สตูล">สตูล </option>-->
                                    <!--<option value="หนองคาย">หนองคาย </option>-->
                                    <!--<option value="หนองบัวลำภู">หนองบัวลำภู </option>-->
                                    <!--<option value="อำนาจเจริญ">อำนาจเจริญ </option>-->
                                    <!--<option value="อุดรธานี">อุดรธานี </option>-->
                                    <!--<option value="อุตรดิตถ์">อุตรดิตถ์ </option>-->
                                    <!--<option value="อุทัยธานี">อุทัยธานี </option>-->
                                    <!--<option value="อุบลราชธานี">อุบลราชธานี</option>-->
                                    <!--<option value="อ่างทอง">อ่างทอง </option>-->
                                    <!--<option value="อื่นๆ">อื่นๆ</option>-->
                            </select>
                            <i></i>
                    </label>
                </section>
                <section class="col-md-2 col-sm-4">
                    <label class="label"><strong>อำเภอ*</strong></label>
                    <label class="select">
                        <select class="form-control district" id="edit-district">
                            <?php if($member->member_district){ ?>
                            <option selected=""><?=$member->member_district?></option>
                            <?php }else{ ?>
                            <option selected="">เลือกอำเภอ</option>
                            <?php } ?>
                        </select>
                        <i></i>
                    </label>
                    <!--<label class="input">-->
                    <!--    <input type="text" name="projectName" id="edit-district" value="<?=$member->member_district?>">-->
                    <!--<i></i>-->
                    <!--</label>-->
                    
                </section>
                <section class="col-md-2 col-sm-4">
                    <label class="label"><strong>ตำบล*</strong></label>
                    <!--    <label class="select" >-->
                    <!--        <select class="form-control district" id="edit-sub-district">-->
                    <!--            <option>เลือกตำบล</option>-->
                    <!--            <option value="ท่าช้าง">ท่าช้าง</option>-->
                    <!--            <option value="บ้านใหญ่">บ้านใหญ่</option>-->
                    <!--            <option value="วังกระโจม" selected="">วังกระโจม</option>-->
                    <!--            <option value="ท่าทราย">ท่าทราย</option>-->
                    <!--            <option value="ดอนยอ">ดอนยอ</option>-->
                    <!--        </select>-->
                    <!--        <i></i>-->
                    <!--    </label>-->
                    <label class="input">
                        <input type="text" name="projectName" id="edit-sub-district" value="<?=$member->member_sub_district?>">
                    <i></i>
                    </label>
                </section>
                
            </div>
            <div class="row">
                <section class="col-md-6">
                    <label class="label"><strong>ภาพประจำตัว <small>*เว้นไว้ถ้าไม่ต้องการเปลี่ยน</small></strong></label>
                    <section>
                        <label for="file" class="input input-file state-success">
                            <div class="button state-success">
                                <input type="file" id="edit-img" name="file" accept="image/*" class="valid">เลือกไฟล์
                            </div>
                            <input type="text" placeholder="กรุณาเลือกไฟล์" readonly="" id="editImgName" value="" class="valid">
                        </label>
                    </section>
                </section>
                <section class="col-md-3">
                    <label class="label"><strong>อีเมล์*</strong></label>
                    <label class="input">
                        <input type="text" name="projectName" id="edit-email" value="<?=$member->member_email?>">
                    </label>
                    
                </section>
                <section class="col-md-3">
                    <label class="label"><strong>กรอกข้อความที่เห็นในภาพ</strong></label>
                    <label class="input input-captcha">
                        <img src="<?=base_url()?>mats/assets/plugins/sky-forms-pro/skyforms/captcha/image.php?&lt;?php echo time(); ?&gt;" width="100" height="32" alt="Captcha image">
                        <input type="text" maxlength="6" name="captcha" id="captcha">
                    </label>
                </section>
            </div>
            <div class="row">
                <section class="col-md-6 col-sm-6">
                    <label class="label"><strong>รหัสผ่านใหม่ *เว้นไว้ถ้าไม่ต้องการเปลี่ยน</strong></label>
                    <label class="input">
                        <input type="password" id="projectName">
                    </label>
                </section>
                <section class="col-md-6 col-sm-6">
                    <label class="label"><strong>ยืนยันรหัสผ่านใหม่ *เว้นไว้ถ้าไม่ต้องการเปลี่ยน</strong></label>
                    <label class="input">
                        <input type="password" id="projectName">
                    </label>
                </section>
            </div>
            <div class="row">
                <section class="col-md-6 col-sm-6">
                    <label class="label"><strong>รหัสผ่าน</strong></label>
                    <label class="input">
                        <input type="password" id="password">
                    </label>
                </section>
            </div>
            
        </fieldset>

        <footer>
            <a href="#"class="button" id="save-btn">บันทึก <i class="fa fa-floppy-o" aria-hidden="true"></i></a>
        </footer>

    </form>
</div>
