
<div class="container content-md">
<?php 
    //$keyword=$_GET['keyword'];
    $keyword = $this->input->get('keyword');
    ?>
    <!--<div class="headline-center margin-bottom-60">-->
    <!--    <h2>ไม่พบข้อมูลของ: <span class="color-green">กำหล่ำปลี</span></h2>-->
    <!--</div>-->
<!--สินค้ามาใหม่-->
<?php if($keyword){ ?>
    <div class="headline-center margin-bottom-60">
            <h2>ผลการค้นหา: <span class="color-green"><?php echo $keyword;?></span></h2>
    </div>
<?php } ?>

<?php $this->load->view( 'main/inc/filter.php' )?>

<div class="row" id="searchProjects">
    <!-- Begin Easy Block -->
    <!--<div class="col-md-3 col-sm-6 md-margin-bottom-40">
        <div class="easy-block-v2">
            
            <a href="singleProduct.php"><img alt="" src="<?=base_url()?>mats/assets/img/main/img9.jpg"></a>
            <a href="singleProduct.php" class="sgProduct"><h3>ถั่วฝักยาวอินทรีย์</h3></a>
            <ul class="list-unstyled">
                <li><span class="color-green">ประเภท:</span> ผัก / ถั่วฝักยาว</li>
                <li><span class="color-green">ราคา:</span> 30 บาท/กิโลกรัม</li>
                <li><span class="color-green">พื้นที่:</span> บ้านนา, นครนายก</li>
            </ul>
            <a href="singleProduct.php" class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
        </div>
    </div>-->
    <!-- End Begin Easy Block -->

    <!-- Begin Easy Block -->
    <!--<div class="col-md-3 col-sm-6 md-margin-bottom-40">
        <div class="easy-block-v2">
            
            <img alt="" src="<?=base_url()?>mats/assets/img/main/img18.jpg">
            <h3>กะหล่ำปลีญี่ปุ่น สีแดง</h3>
            <ul class="list-unstyled">
                <li><span class="color-green">ประเภท:</span> ผัก / กะหล่ำปลีฝรั่ง</li>
                <li><span class="color-green">ราคา:</span> 100 บาท/กระสอบ</li>
                <li><span class="color-green">พื้นที่:</span> บึงกุ่ม,กรุงเทพมหานคร</li>
            </ul>
            <a class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
        </div>
    </div>-->
    <!-- End Begin Easy Block -->

    <!-- Begin Easy Block -->
    <!--<div class="col-md-3 col-sm-6 md-margin-bottom-40">
        <div class="easy-block-v2">
            
            <img alt="" src="<?=base_url()?>mats/assets/img/main/img26.jpg">
            <h3>เมล่อนอินทรีย์</h3>
            <ul class="list-unstyled">
                <li><span class="color-green">ประเภท:</span> ผัก / เมล่อน</li>
                <li><span class="color-green">ราคา:</span> 350 บาท/ใบ</li>
                <li><span class="color-green">พื้นที่:</span> ปากพลี, นครนายก</li>
            </ul>
            <a class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
        </div>
    </div>-->
    <!-- End Begin Easy Block -->

    <!-- Begin Easy Block -->
    <!--<div class="col-md-3 col-sm-6">
        <div class="easy-block-v2">
            <img alt="" src="<?=base_url()?>mats/assets/img/main/img19.jpg">
            <h3>ปลานิลแดงในบ่อซีเมน</h3>
            <ul class="list-unstyled">
                <li><span class="color-green">ประเภท:</span> ผัก / ปลานิลแดง</li>
                <li><span class="color-green">ราคา:</span> 100 บาท/กิโลกรัม</li>
                <li><span class="color-green">พื้นที่:</span> โคราช, นครราชสีมา</li>
            </ul>
            <a class="btn-u btn-u-sm" href="#">ดูโปรเจ็คนี้</a>
        </div>
    </div>-->
    <!-- End Begin Easy Block -->
</div>
<div class="text-center">
    <input type="hidden" id="page" value="1">
    <ul class="pagination" id="projectPageList">
        <!--<li><a href="#">«</a></li>-->
        <!--<li><a href="#">1</a></li>-->
        <!--<li><a href="#">2</a></li>-->
        <!--<li class="active"><a href="#">3</a></li>-->
        <!--<li><a href="#">4</a></li>-->
        <!--<li><a href="#">5</a></li>-->
        <!--<li><a href="#">»</a></li>-->
    </ul>
</div>
 <!--สินค้ามาใหม่-->
<?php ?>
</div>
