<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left"><?=get_project_type_thai_text($project_type_id)?>อินทรีย์</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="<?=base_url().$this->lang->line('main')?>">หน้าแรก</a></li>
            <li class="active"><?=get_project_type_thai_text($project_type_id)?>อินทรีย์</li>
        </ul>
    </div>
</div>
<input type="hidden" id="projectTypeId" value="<?=$project_type_id?>" />
<div class="container content-md">
    <div class="row margin-bottom-40">
        <?php
            if($project_type_id === 1){
                $this->load->view('main/page/vegetable');
            }else if($project_type_id === 2){
                $this->load->view('main/page/fruit');
            }else if($project_type_id === 3){
                $this->load->view('main/page/animal');
            }
        ?>
        
        <div style="clear:both"></div>
        
        <!--เมนูย่อย-->
        <div id="categories">
            <!--<div class="col-sm-6 col-md-3">
                <a href="subCategory.php"  class="btn-u btn-brd btn-u btn-u-lg subCate">ผักบุ้ง (30)</a>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="subCategory.php"  class="btn-u btn-brd btn-u btn-u-lg subCate">ถั่วฝักยาว (20)</a>
            </div>-->
        </div>
        <div class="text-center"><button class="btn rounded btn-default" type="button">แสดงหมวดหมู่ย่อยเพิ่มเติม <i class="fa fa-caret-down" aria-hidden="true"></i></button></div>
    <!--จบเมนูย่อย-->
    </div>
    <!--สินค้ามาใหม่-->
    <div class="headline-center margin-bottom-20">
            <h2><?=get_project_type_thai_text($project_type_id)?> <span class="color-green">อินทรีย์</span> มาใหม่</h2>
        </div>
    <?php $this->load->view( 'main/inc/fillter.php'); ?>
    <div class="row" id="lastProjects">
        <!-- Begin Easy Block -->
        <!-- End Begin Easy Block -->
    </div>
     <!--สินค้ามาใหม่-->
</div>
<!--สินค้ายอดนิยม-->
<div class="parallax-team parallaxBg" style="background-position: 50% 33px;">
    <div class="container content">
        <div class="title-box-v2">
            <h2>ผัก <span class="color-red">อินทรีย์</span> ยอดนิยม</h2>
        </div>
        <div class="row">
            <!-- Begin Easy Block -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-40">
                <div class="easy-block-v2">
                    <a href="singleProduct.php" class="linkFull"></a>
                    <div class="easy-bg-v2 rgba-red">ยอดนิยม</div>
                    <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0004.jpg">
                    <h3>ถั่วฝักยาวอินทรีย์</h3>
                    <ul class="list-unstyled">
                        <li><span class="color-green">ประเภท:</span> ผัก / ถั่วฝักยาว</li>
                        <li><span class="color-green">ราคา:</span> 30 บาท/กิโลกรัม</li>
                        <li><span class="color-green">ฟาร์ม:</span> ไร่ลุงแดง</li>
                        <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> บ้านนา, นครนายก</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
                </div>
            </div>
            <!-- End Begin Easy Block -->

            <!-- Begin Easy Block -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-40">
                <div class="easy-block-v2">
                    <a href="singleProduct.php" class="linkFull"></a>
                    <div class="easy-bg-v2 rgba-red">ยอดนิยม</div>
                    <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0003.jpg">
                    <h3>กะหล่ำปลีญี่ปุ่น สีแดง</h3>
                    <ul class="list-unstyled">
                        <li><span class="color-green">ประเภท:</span> ผัก / กะหล่ำปลีฝรั่ง</li>
                        <li><span class="color-green">ราคา:</span> 100 บาท/กระสอบ</li>
                        <li><span class="color-green">ฟาร์ม:</span> ไร่ลุงแดง</li>
                        <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> บึงกุ่ม,กรุงเทพมหานคร</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
                </div>
            </div>
            <!-- End Begin Easy Block -->

            <!-- Begin Easy Block -->
            <div class="col-md-3 col-sm-6 md-margin-bottom-40">
                <div class="easy-block-v2">
                    <a href="singleProduct.php" class="linkFull"></a>
                    <div class="easy-bg-v2 rgba-red">ยอดนิยม</div>
                    <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0006.jpg">
                    <h3>เมล่อนอินทรีย์</h3>
                    <ul class="list-unstyled">
                        <li><span class="color-green">ประเภท:</span> ผัก / เมล่อน</li>
                        <li><span class="color-green">ราคา:</span> 350 บาท/ใบ</li>
                        <li><span class="color-green">ฟาร์ม:</span> ไร่ลุงแดง</li>
                        <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> ปากพลี, นครนายก</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
                </div>
            </div>
            <!-- End Begin Easy Block -->

            <!-- Begin Easy Block -->
            <div class="col-md-3 col-sm-6">
                <div class="easy-block-v2">
                    <a href="singleProduct.php" class="linkFull"></a>
                    <div class="easy-bg-v2 rgba-red">ยอดนิยม</div>
                    <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0009.jpg">
                    <h3>ปลานิลแดงในบ่อซีเมน</h3>
                    <ul class="list-unstyled">
                        <li><span class="color-green">ประเภท:</span> ผัก / ปลานิลแดง</li>
                        <li><span class="color-green">ราคา:</span> 100 บาท/กิโลกรัม</li>
                        <li><span class="color-green">ฟาร์ม:</span> ไร่ลุงแดง</li>
                        <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> โคราช, นครราชสีมา</li>
                    </ul>
                    <a class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
                </div>
            </div>
            <!-- End Begin Easy Block -->
        </div>
        <div class="row">
        <!-- Begin Easy Block -->
        <div class="col-md-3 col-sm-6 md-margin-bottom-40">
            <div class="easy-block-v2">
                <a href="singleProduct.php" class="linkFull"></a>
                <div class="easy-bg-v2 rgba-red">ยอดนิยม</div>
                <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0010.jpg">
                <h3>ถั่วฝักยาวอินทรีย์</h3>
                <ul class="list-unstyled">
                    <li><span class="color-green">ประเภท:</span> ผัก / ถั่วฝักยาว</li>
                    <li><span class="color-green">ราคา:</span> 30 บาท/กิโลกรัม</li>
                    <li><span class="color-green">ฟาร์ม:</span> ไร่ลุงแดง</li>
                    <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> บ้านนา, นครนายก</li>
                </ul>
                <a class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
            </div>
        </div>
        <!-- End Begin Easy Block -->

        <!-- Begin Easy Block -->
        <div class="col-md-3 col-sm-6 md-margin-bottom-40">
            <div class="easy-block-v2">
                <a href="singleProduct.php" class="linkFull"></a>
                <div class="easy-bg-v2 rgba-red">ยอดนิยม</div>
                <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0007.jpg">
                <h3>กะหล่ำปลีญี่ปุ่น สีแดง</h3>
                <ul class="list-unstyled">
                    <li><span class="color-green">ประเภท:</span> ผัก / กะหล่ำปลีฝรั่ง</li>
                    <li><span class="color-green">ราคา:</span> 100 บาท/กระสอบ</li>
                    <li><span class="color-green">ฟาร์ม:</span> ไร่ลุงแดง</li>
                    <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> บึงกุ่ม,กรุงเทพมหานคร</li>
                </ul>
                <a class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
            </div>
        </div>
        <!-- End Begin Easy Block -->

        <!-- Begin Easy Block -->
        <div class="col-md-3 col-sm-6 md-margin-bottom-40">
            <div class="easy-block-v2">
                <a href="singleProduct.php" class="linkFull"></a>
                <div class="easy-bg-v2 rgba-red">ยอดนิยม</div>
                <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0008.jpg">
                <h3>เมล่อนอินทรีย์</h3>
                <ul class="list-unstyled">
                    <li><span class="color-green">ประเภท:</span> ผัก / เมล่อน</li>
                    <li><span class="color-green">ราคา:</span> 350 บาท/ใบ</li>
                    <li><span class="color-green">ฟาร์ม:</span> ไร่ลุงแดง</li>
                    <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> ปากพลี, นครนายก</li>
                </ul>
                <a class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
            </div>
        </div>
        <!-- End Begin Easy Block -->

        <!-- Begin Easy Block -->
        <div class="col-md-3 col-sm-6">
            <div class="easy-block-v2">
                <a href="singleProduct.php" class="linkFull"></a>
                <div class="easy-bg-v2 rgba-red">ยอดนิยม</div>
                <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0011.jpg">
                <h3>ปลานิลแดงในบ่อซีเมน</h3>
                <ul class="list-unstyled">
                    <li><span class="color-green">ประเภท:</span> ผัก / ปลานิลแดง</li>
                    <li><span class="color-green">ราคา:</span> 100 บาท/กิโลกรัม</li>
                    <li><span class="color-green">ฟาร์ม:</span> ไร่ลุงแดง</li>
                    <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> โคราช, นครราชสีมา</li>
                </ul>
                <a class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
            </div>
        </div>
        <!-- End Begin Easy Block -->
    </div>
        </div>
    </div>
<!--สินค้ายอดนิยม-->

<?php $this->load->view( 'main/inc/article.php');?>