<article class="content forms-page">
                    <div class="title-block">
                        <h3 class="title">รายละเอียดโปรเจ็ค</h3>
                    </div>
                    
                    <?php foreach($project_detail as $project){ ?>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <p class="title"><?=$project->project_name  ?></p>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="card sameheight-item" style="height: 326px;">
                                                 <?php if($project->project_cover_image_path){  ?> <img src="<?=base_url().$project->project_cover_image_path?>" style="max-width:100%;"> <?php }else{  ?> <div class="cover"></div>   <?php  } ?>   
                                                <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="card card-default pBox">
                                                        <div class="card-header">
                                                            <div class="header-block">
                                                                <p class="title"> เกี่ยวกับโปรเจ็ค </p>
                                                            </div>
                                                        </div> 
                                                        <div class="card-block">
                                                            <p><b>ชื่อสินค้า:</b> <?=$project->project_name  ?></p>
                                                            <p><b>ประเภท:</b> <?=$project->project_type_name  ?></p>
                                                            <p><b>ชนิด:</b> <?=$project->category_name  ?></p>
                                                            <p><b>สายพันธุ์:</b> <?=$project->breed_name  ?></p> 
                                                            <p><b>ข้อมูลเกี่ยวกับสินค้า:</b><?=$project->project_detail  ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="col-xl-4">
                                                    <div class="card card-default pBox">
                                                        <div class="card-header">
                                                            <div class="header-block">
                                                                <p class="title"> ข้อมูลฟาร์ม </p>
                                                            </div>
                                                        </div>
                                                        <div class="card-block">
                                                            <p><b>ชื่อฟาร์ม:</b> <?=$project->farm_name  ?> </p>
                                                            <p><b>ชื่อเกษตรกร:</b> <?=$project->member_firstname  ?>  <?=$project->member_lastname  ?></p>
                                                            <p><b>ที่อยู่ฟาร์ม:</b> <?=$project->member_address  ?></p>
                                                            <!--ไปหน้าโชว์ดปรเจ็คโดย fillter by ชื่อฟาร์มนั้นๆ-->
                                                            <p><a class="btn btn-secondary btn-sm" href="<?=base_url()?>gnc_admin/projects/getFarmId/<?=$project->farm_id?>"><i class="fa fa-th-list"></i> ดูโปรเจ็คทั้งหมดของฟาร์มนี้</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="col-xl-4">
                                                    <div class="card card-default pBox">
                                                        <div class="card-header">
                                                            <div class="header-block">
                                                                <p class="title"> ข้อมูลอื่นๆ </p>
                                                            </div>
                                                        </div>
                                                        <div class="card-block">  
                                                            <p><b>หน่วยที่ขาย:</b> <?=$project->unit_name ?></p>
                                                            <p><b>ราคา:</b> <?=$project->project_ppu ?> บาท/<?=$project->unit_name ?></p>
                                                            <p><b>กำลังผลิต:</b> <?=$project->project_quantity ?> <?=$project->unit_name ?></p>
                                                            <p><b>สั่งซื้อขั้นต่ำ:</b> <?=$project->project_lowest_order ?> <?=$project->unit_name ?></p>
                                                            <p><b>วันที่พร้อมจำหน่าย:</b> <?=$project->project_selldate ?></p>
                                                            <p><b>ช่องทางการจัดส่ง:</b><?php   if($project->shipment_name){$project->shipment_name;}else{echo '   -';} ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn btn-secondary-outline" href="<?=base_url()?>gnc_admin/projects/allProject">"><i class="fa fa-chevron-left"></i> โปรเจ็คทั้งหมด</a> 
                                         <a href="<?=base_url()?>gnc_admin/projectEdit/<?=$project->project_id?>" class="btn btn-warning"><i class="fa fa-pencil"></i> แก้ไขข้อมูลโปรเจ็ค</a>
                                                <!--ลิงค์ไปหน้าไทม์ไลน์ของโปรเจ็คเลย-->
                                                <a href="#showProjectTimeLine" class="btn btn-primary"><i class="fa fa-picture-o"></i> ดูไทม์ไลน์</a>
                                    <!-- /.card-block -->
                                        </div>
                                      
                                    </div>
                                    
                                </div>
                            </div>
            </div>
            </section>
             <?php } ?>
            
            </article>
            