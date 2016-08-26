<div class="breadcrumbs">
    <input type="hidden" id="projectId" value="<?=$project->project_id?>"/>
    <div class="container">
        <h1 class="pull-left"><?=$project->project_name?>#1</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.php">หน้าแรก</a></li>
            <li><a href="category.php?name=vegetable"><?=$project->project_type_name?></a></li>
            <li><a href="subCategory.php"><?=$project->category_name?></a></li>
            <li class="active"><?=$project->project_name?>#2</li>
        </ul>
    </div>
</div>
<div class="search-block parallaxBg" style="background-position: 50% 16px;background: url(<?=base_url().$project->project_cover_image_path?>) 50% 0 repeat fixed;">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h1><?=$project->project_name?></h1>
            <div class="profile-blog">
                <img class="rounded-x" style="max-width:100px;" src="<?=base_url()?>mats/assets/img/testimonials/img1.jpg" alt="">
                <div class="coverDetail">
                    <strong class="coverProfile">เกษตรกร: <?=$project->member_firstname?> <?=$project->member_lastname?></strong> <br>
                    <a class="farmProfile"><i class="fa fa-map-signs" aria-hidden="true"></i> <?=$project->farm_name?></a> <br>
                    <?php if(!$is_owner){?>
                        <?php if($is_follow_project){?>
                        <a href="singleProduct.php" class="btn-u btn-u-xs btn-u-blue"><i class="fa fa-bookmark" aria-hidden="true"></i> กำลังติดตามฟาร์ม</a>
                        <?php }else{ ?>
                        <a href="singleProduct.php?follow=yes" class="btn-u btn-u-xs btn-u-dark"><i class="fa fa-bookmark" aria-hidden="true"></i> ติดตามฟาร์ม</a>
                        <?php } ?>
                        <?php if(isset($_GET['kaset'])=="yes"){?>
                        <a href="singleProduct.php" class="btn-u btn-u-xs btn-u-red"><i class="fa fa-bookmark" aria-hidden="true"></i> กำลังติดตามเกษตรกร</a>
                        <?php }else{ ?>
                        <a href="singleProduct.php?follow=yes&kaset=yes" class="btn-u btn-u-xs btn-u-default"><i class="fa fa-bookmark" aria-hidden="true"></i> ติดตามเกษตรกร</a>
                        <?php } ?>
                    <?php } ?>
                    
                    <br>
                    <span class="coverLocation"><i class="fa fa-map-marker"></i> <?=$project->farm_district?>, <?=$project->farm_province?></span>
                </div>
            </div>
        </div>
    </div>
</div>
        
<div class="container content profile">
    <div class="row">
        <!--Left Sidebar-->
        <div class="col-md-3 md-margin-bottom-40">
            <img class="img-responsive" src="<?=base_url()?>mats/assets/img/verify.png" alt="">
            <div class="information">
                <strong><i class="fa fa-info-circle" aria-hidden="true"></i> ข้อมูล</strong>
                <p><?=$project->project_detail?></p>
            </div>
            <div class="price margin-bottom-20">
                <a class="btn-u btn-brd btn-u btn-u-lg subCate"><?=$project->project_ppu?> บาท/<?=$project->project_unit_name?></a>
                <!--กรณีของหมด-->
                <!--<a class="btn-u btn-u-red btn-u-lg subCate">หยุดจำหน่ายแล้ว</a>-->
            </div>
            <ul class="list-group sidebar-nav-v1 margin-bottom-10" id="sidebar-nav-1">
                <li class="list-group-item">
                    <?php if(!$is_owner){ ?>
                        <?php if(isset($_GET['follow'])=="yes"){?>
                        <a href="singleProduct.php" class="btn-u btn-u-blue"><i class="fa fa-bookmark" aria-hidden="true"></i> กำลังติดตามสินค้านี้</a>
                        <?php }else{ ?>
                        <a href="singleProduct.php?follow=yes" class="btn-u btn-u-dark"><i class="fa fa-bookmark" aria-hidden="true"></i> ติดตามสินค้านี้</a>
                        <?php } ?>
                    <?php } ?>
                </li>
                <li class="list-group-item">
                    <a href="#"><i class="fa fa-cogs"></i> กำลังผลิต: <?=$project->project_quantity?> <?=$project->project_unit_name?></a>
                </li>
                <li class="list-group-item">
                    <a href="#"><i class="fa fa-truck"></i> การจัดส่ง: <span id="shipmentWay">โปรดติดต่อasdsadsdsd</span></a>
                </li>
                <li class="list-group-item">
                    <a href="#"><i class="fa fa-calendar"></i> พร้อมจำหน่าย: <?=display_date($project->project_selldate)?></a>
                </li>
                <li class="list-group-item">
                    <div class="text-center star margin-bottom-10">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i><br>
                <?php if($is_sign_in && !$is_owner){ ?>
                <button class="btn-u rounded btn-u-primary" data-toggle="modal" data-target="#voteForm" type="button"><i class="fa fa-star" aria-hidden="true"></i> โหวต</button>
                <?php } ?>
                
                <div class="modal fade" id="voteForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="#" class="sky-form">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel4">โหวตสินค้านี้</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="rating">
                                            <input type="radio" name="stars-rating" id="stars-rating-5">
                                            <label for="stars-rating-5"><i class="fa fa-star"></i></label>
                                            <input type="radio" name="stars-rating" id="stars-rating-4">
                                            <label for="stars-rating-4"><i class="fa fa-star"></i></label>
                                            <input type="radio" name="stars-rating" id="stars-rating-3">
                                            <label for="stars-rating-3"><i class="fa fa-star"></i></label>
                                            <input type="radio" name="stars-rating" id="stars-rating-2">
                                            <label for="stars-rating-2"><i class="fa fa-star"></i></label>
                                            <input type="radio" name="stars-rating" id="stars-rating-1">
                                            <label for="stars-rating-1"><i class="fa fa-star"></i></label>
                                            <a>เลือกระดับคะแนน (1-5)</a>
                                        </div>
                                        <section>
                                            <label class="label">ความคิดเห็น</label>
                                            <label class="input">
                                                <i class="icon-append fa fa-comment"></i>
                                                <input type="text" name="subject" id="subject">
                                            </label>
                                        </section>
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="label">วันที่ซื้อของ</label>
                                                <label class="input">
                                                    <i class="icon-append fa fa-calendar"></i>
                                                    <input type="text" name="date" id="date" placeholder="เช่น 10 มกราคม 2559">
                                                </label>
                                            </section>
                                            <section class="col col-6">
                                                <label class="label">จำนวนที่ซื้อ</label>
                                                <label class="input">
                                                    <input type="text" name="total" placeholder="เช่น 20 กิโลกรัม">
                                                </label>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-u btn-u-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>ยกเลิก</button>
                                <button type="button" class="btn-u btn-u-primary"><i class="fa fa-star"></i> โหวต</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="btn-u rounded btn-u-dark" data-toggle="modal" data-target="#voteResult" type="button"><i class="fa fa-list" aria-hidden="true"></i> ผลโหวต</button>        
                    <div class="modal fade" id="voteResult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="#" class="sky-form">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel4">คะแนนโหวตและความคิดเห็น</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="result"> 18/50 <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i></div>
                                            
                                            <div class="result">12/50 <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i></div>
                                            
                                            <div class="result">10/50 <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i></div>
                                            
                                            <div class="result">08/50 <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i></div>
                                            
                                            <div class="result">02/50 <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i></div>
                                            <br>
                                            <div class="testimonials-v6 text-left">
                                            <div class="row margin-bottom-50">
                                                <div class="col-md-12 margin-bottom-10">
                                                    <div class="testimonials-info rounded-bottom bg-color-light">
                                                        <img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img5.jpg" alt="">
                                                        <div class="testimonials-desc">
                                                            <p>สินค้ามีคุณภาพระดับนึงเลยครับ ไม่ผิดหวังจริงๆ</p>
                                                            <div class="resultRate">5.0 <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i></div>
                                                            <strong>ชาติชาย ชาติไทย  <small>(สั่งซื้อ 10 กิโลกรัม)</small></strong>
                                                            <span class="coverLocation"><i class="fa fa-map-marker"></i>ปากช่อง, นครราชศรีมา</span>
                                                            <button class="btn btn-xs rounded btn-success" type="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> เห็นด้วย (20)</button>
                                                            <button class="btn btn-xs rounded btn-danger" type="button"><i class="fa fa-thumbs-down" aria-hidden="true"></i> ไม่เห็นด้วย (5)</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 margin-bottom-10">
                                                    <div class="testimonials-info rounded-bottom bg-color-light">
                                                        <img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img6.jpg" alt="">
                                                        <div class="testimonials-desc">
                                                            <p>ทำไมของฉันได้รับสินค้าที่แย่มากเลย</p>
                                                            <div class="resultRate">1.0 <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i></div>
                                                            <strong>นิพา เงินทอง  <small>(สั่งซื้อ 10 กิโลกรัม)</small></strong>
                                                            <span class="coverLocation"><i class="fa fa-map-marker"></i>ปากช่อง, นครราชศรีมา</span>
                                                             <button class="btn btn-xs rounded btn-default" type="button" disabled><i class="fa fa-thumbs-up" aria-hidden="true"></i> เห็นด้วย (21)</button>
                                                            <button class="btn btn-xs rounded btn-danger" type="button"><i class="fa fa-thumbs-down" aria-hidden="true"></i> ไม่เห็นด้วย (5)</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 margin-bottom-10">
                                                    <div class="testimonials-info rounded-bottom bg-color-light">
                                                        <img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img3.jpg" alt="">
                                                        <div class="testimonials-desc">
                                                            <p>สินค้าสวยงามมาก ขายต่อได้ราคาดีสุดๆ</p>
                                                            <div class="resultRate">5.0 <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i></div>
                                                            <strong>สมปอง สองคน  <small>(สั่งซื้อ 10 กิโลกรัม)</small></strong>
                                                            <span class="coverLocation"><i class="fa fa-map-marker"></i>ปากช่อง, นครราชศรีมา</span>
                                                             <button class="btn btn-xs rounded btn-success" type="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> เห็นด้วย (20)</button>
                                                            <button class="btn btn-xs rounded btn-default" type="button" disabled><i class="fa fa-thumbs-down" aria-hidden="true"></i> ไม่เห็นด้วย (6)</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 margin-bottom-10">
                                                    <div class="testimonials-info rounded-bottom bg-color-light">
                                                        <img class="rounded-x" src="<?=base_url()?>mats/assets/img/testimonials/img2.jpg" alt="">
                                                        <div class="testimonials-desc">
                                                            <p>อยากให้ผลิตมากกว่านี้อีก</p>
                                                            <div class="resultRate">4.0 <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i></div>
                                                            <strong>สุรีภา สาระ  <small>(สั่งซื้อ 10 กิโลกรัม)</small></strong>
                                                            <span class="coverLocation"><i class="fa fa-map-marker"></i>ปากช่อง, นครราชศรีมา</span>
                                                             <button class="btn btn-xs rounded btn-success" type="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> เห็นด้วย (20)</button>
                                                            <button class="btn btn-xs rounded btn-danger" type="button"><i class="fa fa-thumbs-down" aria-hidden="true"></i> ไม่เห็นด้วย (5)</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--/end row-->
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn-u btn-u-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>ปิดหน้าต่าง</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            
                </li>
            </ul>
            
            <a class="btn-u btn-u-lg btn-full  text-center margin-bottom-10" href="chatMain.php">แชทเลย <i class="fa fa-comment" aria-hidden="true"></i></a>
            
            <div class="text-center"><img style="max-width:100%;" src="<?=base_url()?>mats/assets/img/ads-300.jpg"></div>

        

        

            
        </div>
        <!--End Left Sidebar-->

        <!-- Profile Content -->
        <div class="col-md-9">
            <div class="profile-body margin-bottom-20">
                
                <div class="tab-v1">
                    <ul class="nav nav-justified nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#timeline" aria-expanded="true"><i class="fa fa-bars" aria-hidden="true"></i> Timeline</a></li>
                        <li class=""><a data-toggle="tab" href="#photo" aria-expanded="false"><i class="fa fa-picture-o" aria-hidden="true"></i> Photo</a></li>
                        
                    </ul>
                    <div class="tab-content">
                        <div id="timeline" class="profile-edit tab-pane fade active in">
                            <div class="margin-bottom-40">
                            <?php if($is_owner){ ?>
                            <button class="btn-u btn-u-lg rounded-4x btn-full" data-toggle="modal" data-target="#updateForm" type="button">อัพเดท <i class="fa fa-plus" aria-hidden="true"></i></button>
                            <div class="modal fade" id="updateForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel4">อัพเดทไทม์ไลน์</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="#" method="post" id="sky-form3" class="sky-form">
                                                        <input class="form-control input-lg margin-bottom-10" id="postCaption" type="text" placeholder="หัวข้อ">
                                                        <section>
                                                            <label for="file" class="input input-file state-success">
                                                                <div class="button state-success"><input type="file" name="file" id="postFile" multiple="" onchange="this.parentNode.nextSibling.value = this.value;" class="valid">เลือกไฟล์ภาพ</div>
                                                                <input type="text" id="postFileName" placeholder="เลือกไฟล์ภาพที่ต้องการอัพเดท" readonly="" class="valid">
                                                            </label>
                                                        </section>
                                                        <textarea class="form-control" id="postDetail" rows="7"></textarea>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn-u btn-u-default" data-dismiss="modal">ยกเลิก</button>
                                            <button type="button" id="updateTimelineBtn" class="btn-u btn-u-primary">อัพเดท</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    <ul class="timeline-v2">
                    <li>
                        <time class="cbp_tmtime" datetime=""><span>10/4/2559</span> <span>มกราคม</span></time>
                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                        <div class="cbp_tmlabel">
                            <h2>เริ่มเห็นความสำเร็จแล้วครับ กำลังงอกงาม</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <img class="img-responsive" src="<?=base_url()?>mats/assets/img/upload/timeline/0003.jpg" alt="">
                                    <div class="margin-bottom-20"></div>
                                </div>
                                <div class="col-md-12">
                                    <p>เย่! ออกหน่อแล้วครับสวยงามอย่าบอกใครเชียว ใครสนใจอย่าลืมกดติดตามไว้นะครับ ปลูกไม่เยอะครับรับทักแชทมาจองกันไว้ก่อนได้ลยขายจำกัดแค่ 100 กิโลเท่านั้นนะครับ</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime=""><span>5/4/2559</span> <span>มกราคม</span></time>
                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                        <div class="cbp_tmlabel">
                            <h2>รดน้ำเบาๆก่อนทานข้าว</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <img class="img-responsive" src="<?=base_url()?>mats/assets/img/upload/timeline/0002.jpg" alt="">
                                    <div class="margin-bottom-20"></div>
                                </div>
                                <div class="col-md-12">
                                    <p>ก่อนไปกินข้าววันนี้แวะรดน้ำให้มันหน่อยจะได้ออกมาเติบโตงดงาม น่ารับประทานครับ ใครสนใจอย่าลืมกดติดตามไว้นะครับ ปลูกไม่เยอะครับรับทักแชทมาจองกันไว้ก่อนได้ลยขายจำกัดแค่ 100 กิโลเท่านั้นนะครับ</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime=""><span>1/4/2559</span> <span>มกราคม</span></time>
                        <i class="cbp_tmicon rounded-x hidden-xs"></i>
                        <div class="cbp_tmlabel">
                            <h2>วันนี้ฤกษ์งามยามดี เลยลงเมล็ดซะเลย</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <img class="img-responsive" src="<?=base_url()?>mats/assets/img/upload/timeline/0001.jpg" alt="">
                                    <div class="margin-bottom-20"></div>
                                </div>
                                <div class="col-md-12">
                                    <p>เริ่มลงเมล็ดแล้วครับผักบุ้งจีนปลอดสารพิษ 100% ใครสนใจอย่าลืมกดติดตามไว้นะครับ ปลูกไม่เยอะครับรับทักแชทมาจองกันไว้ก่อนได้ลยขายจำกัดแค่ 100 กิโลเท่านั้นนะครับ</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                            <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">เก่ากว่านี้ <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></button>
                        </div>

                        <div id="photo" class="profile-edit tab-pane fade">
                            <h2 class="heading-md">รูปภาพทั้งหมดของโปรเจ็คนี้</h2>
                            <br>
                             <div class="row  margin-bottom-30">
                                <div class="col-sm-4 sm-margin-bottom-30">
                                    <a href="assets/img/main/img2.jpg" rel="gallery1" class="fancybox img-hover-v1" title="Image 1">
                                        <span><img class="img-responsive" src="<?=base_url()?>mats/assets/img/upload/timeline/0001.jpg" alt=""></span>
                                    </a>
                                </div>
                                <div class="col-sm-4 sm-margin-bottom-30">
                                    <a href="assets/img/main/img4.jpg" rel="gallery1" class="fancybox img-hover-v1" title="Image 2">
                                        <span><img class="img-responsive" src="<?=base_url()?>mats/assets/img/upload/timeline/0002.jpg" alt=""></span>
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="assets/img/main/img5.jpg" rel="gallery1" class="fancybox img-hover-v1" title="Image 3">
                                        <span><img class="img-responsive" src="<?=base_url()?>mats/assets/img/upload/timeline/0003.jpg" alt=""></span>
                                    </a>
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Profile Content -->
    </div><!--/end row-->
</div>


<div style="clear:both;"></div>
