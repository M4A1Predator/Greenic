<article class="content forms-page">
                    <div class="title-block">
                        <h3 class="title">ข้อมูลฟาร์ม</h3>
                    </div>
                    
                     <?php foreach($farm_detail as $farm){ ?>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <p class="title"> ไร่ผักลุงจอน@นครนายก </p>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                         <p><b>ชื่อฟาร์ม:</b><?=$farm->farm_name?></p>
                                                            <p><b>ชื่อเกษตรกร:</b> <a href="?page=farmerDetail" title="คลิกดูข้อมูลเกษตรกร"><?=$farm->member_firstname?> <?=$farm->member_lastname?></a></p>
                                                            <p><b>ที่อยู่ฟาร์ม:</b> <?=$farm->farm_address?>  <?=$farm->farm_district?> <?=$farm->farm_sub_district?>  <?=$farm->farm_province?></p>
                                                            <!--ไปหน้าโชว์โปรเจ็คโดย fillter by ชื่อฟาร์มนั้นๆ-->
                                        <?php if($farm->count_project){ ?> <p><a class="btn btn-secondary btn-sm" href="<?=base_url()?>gnc_admin/projects/getFarmId/<?=$farm->farm_id?>"><i class="fa fa-th-list"></i> ดูโปรเจ็คทั้งหมดของฟาร์มนี้</a></p>  <?php  }else{echo'None Project';}?>
                                                            
                                    </div>
                                    <div class="card-footer"><a class="btn btn-secondary-outline" href="#" onclick="history.back();" ><i class="fa fa-chevron-left"></i> ฟาร์มทั้งหมด</a> <a href="<?=base_url()?>gnc_admin/editFarm/<?=$farm->farm_id?>" class="btn btn-warning"><i class="fa fa-pencil"></i> แก้ไขฟาร์ม</a></div>
                                </div>
                            </div>
            </div>
            </section>
              <?php } ?>
            
            </article>
            