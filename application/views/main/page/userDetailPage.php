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
                                    <option value="0"><?=$member->member_province?></option>
                                    <?php }else{ ?>
                                    <option value="" selected="">เลือกจังหวัด</option>
                                    <?php }?>
                                    <?php foreach($province_arr as $province){ ?>
                                    <option value="<?=$province->province_id?>"><?=$province->province_name?></option>
                                    <?php  } ?>
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
                            <option value="0" selected=""><?=$member->member_district?></option>
                            <?php }else{ ?>
                            <option value="" selected="">เลือกอำเภอ</option>
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
                        <label class="select" >
                            <select class="form-control district" id="edit-sub-district">
                                <?php if($member->member_sub_district){ ?>
                                <option value="0" selected=""><?=$member->member_sub_district?></option>
                                <?php }else{ ?>
                                <option value="">เลือกตำบล</option>
                                <?php } ?>
                            </select>
                            <i></i>
                        </label>
                    <!--<label class="input">-->
                    <!--    <input type="text" name="projectName" id="edit-sub-district" value="<?=$member->member_sub_district?>">-->
                    <!--<i></i>-->
                    <!--</label>-->
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
                        <input type="text" name="projectName" id="edit-email" disabled="" value="<?=$member->member_email?>">
                    </label>
                    
                </section>
                <!--<section class="col-md-3">-->
                <!--    <label class="label"><strong>กรอกข้อความที่เห็นในภาพ</strong></label>-->
                <!--    <label class="input input-captcha">-->
                <!--        <img src="<?=base_url()?>mats/assets/plugins/sky-forms-pro/skyforms/captcha/image.php?&lt;?php echo time(); ?&gt;" width="100" height="32" alt="Captcha image">-->
                <!--        <input type="text" maxlength="6" name="captcha" id="captcha">-->
                <!--    </label>-->
                <!--</section>-->
            </div>
            <?php if(!$this->session->userdata('facebook_sign_in')){ ?>
            <div class="row">
                <section class="col-md-6 col-sm-6">
                    <label class="label"><strong>รหัสผ่านใหม่ *เว้นไว้ถ้าไม่ต้องการเปลี่ยน</strong></label>
                    <label class="input">
                        <input type="password" id="newPassword">
                    </label>
                </section>
                <section class="col-md-6 col-sm-6">
                    <label class="label"><strong>ยืนยันรหัสผ่านใหม่ *เว้นไว้ถ้าไม่ต้องการเปลี่ยน</strong></label>
                    <label class="input">
                        <input type="password" id="reNewPassword">
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
            <?php } ?>    
        </fieldset>
        
        <footer>
            <span id="errorMsg"></span>
            <a href="#"class="button" id="save-btn">บันทึก <i class="fa fa-floppy-o" aria-hidden="true"></i></a>
        </footer>
        
    
    </form>
</div>
