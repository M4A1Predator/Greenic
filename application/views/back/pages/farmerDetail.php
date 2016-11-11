
<article class="content forms-page">
                   
                    <div class="title-block">
                        <h3 class="title">ข้อมูลสมาชิก</h3>
                    </div>
                    
                    <?php foreach($farmer_detail as $detail){ ?>
                    
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <div class="header-block">
                                                            
                                            <p class="title">  <?=$detail->member_firstname?>  <?=$detail->member_lastname?></p>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="card sameheight-item" style="height: 326px;">
                                                <!--ไปหน้าโชว์ฟาร์มทั้งหมด แล้ว fillter โดยชื่อเกษตรกร-->
                                                 <!--<a class="btn btn-primary-outline" href="?page=allFarm">ฟาร์มทั้งหมด (<?=$detail->farm_count?>)</a>-->
                                                <!--ไปหน้าโชว์โปรเจ็คทั้งหมด แล้ว fillter โดยชื่อเกษตรกร-->
                                                 <a class="btn btn-info-outline" href="?page=memberProjectShowe">โปรเจ็คทั้งหมด (<?=$detail->project_count?>)</a>
                                                 <!--<a class="btn btn-warning-outline" href="?page=memberChatShowe">รายการสนทนา (5)</a>-->
                                                    
                                                <br/>
                                                <p><b>ที่อยู่:</b> <?=$detail->member_address?> </p>
                                                <p><b>อีเมล์:</b> <?=$detail->member_email?></p>
                                                
                                                <p><b>ภาพประจำตัว</b>
                                                <?php if($detail->member_img_path) { ?>
                                                <br/><img src="<?=base_url().$detail->member_img_path?>" class="img-responsive">
                                                <?php }else{echo ': -';}?>
                                                <br/><br/>
                                                <!--<a href="<?=base_url()?>gnc_admin/memberEdit/<?=$detail->member_id?>" class="btn btn-warning"><i class="fa fa-pencil"></i> แก้ไขข้อมูลสมาชิก</a>-->
                                                            
                                    <!-- /.card-block -->
                                    
            
                                </div>
                                      
                                    </div>
                                    
                                </div>
                            </div>
            </div>
            </section>
                <?php }?>
            </article>
           