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
<input type="hidden" id="projectTypeName" value="<?=$project_type_name?>" />
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
                <h2><?=get_project_type_thai_text($project_type_id)?> <span class="color-red">อินทรีย์</span> ยอดนิยม</h2>
            </div>
            <div class="row" id="popProjects">
                <!-- Begin Easy Block -->
                <!-- End Begin Easy Block -->
            </div>
        </div>
    </div>
<!--สินค้ายอดนิยม-->

<?php $this->load->view( 'main/inc/article.php');?>