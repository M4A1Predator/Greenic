<article class="content forms-page">
                    <div class="title-block">
                        <h3 class="title">ข้อมูลสมาชิก</h3>
                    </div>
                    
                    <?php foreach($member_detail as $detail){ ?>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <div class="header-block"> 
                                            <p class="title"> <?=$detail->member_firstname?>  </p>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <p>ที่อยู่: <?php if($detail->member_address){ echo"$detail->member_address";}else{echo"-";}?></p>
                                        <p>อีเมล์: <?=$detail->member_email?></p>
                                        
                                        <p>ภาพประจำตัว <?php if($detail->member_img_path){ ?> <br/>  <img src="<?=base_url().$detail->member_img_path?>" class="img-responsive"> <br/>  <?php } else{echo" : -";}?> 
                                            
                                    </div>
                                    <!--<div class="card-footer"><a href="<?=base_url()?>gnc_admin/memberEdit/<?=$detail->member_id?>" class="btn btn-warning"><i class="fa fa-pencil"></i> แก้ไขข้อมูลสมาชิก</a></div>-->
                                </div>
                            </div>
            </div>
            </section>
            <?php } ?>
            
            </article>
            