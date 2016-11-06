<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left">บทความ</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="<?=base_url()?>">หน้าแรก</a></li>
            <li class="active">บทความ</li>
        </ul>
    </div>
</div>

<input type="hidden" id="page" value="" />

<div class="container content-md">
    <div class="row margin-bottom-20" id="articleList">
        <?php for($i=0;$i<16;$i++){?>
        <!--<div class="col-md-3 col-sm-6">-->
        <!--    <div class="thumbnails thumbnail-style thumbnail-kenburn">-->
        <!--        <div class="thumbnail-img">-->
        <!--            <div class="overflow-hidden">-->
        <!--                <img class="img-responsive" src="<?=base_url()?>mats/assets/img/main/img1.jpg" alt="">-->
        <!--            </div>-->
        <!--            <a class="btn-more hover-effect" href="showArticle.php">อ่านเรื่องนี้ +</a>-->
        <!--        </div>-->
        <!--        <div class="caption">-->
        <!--            <h3><a class="hover-effect" href="showArticle.php">เทคนิคการรดน้ำผัก</a></h3>-->
        <!--            <p>เปลี่ยนข้อผิดพลาดของมือใหม่ที่เคยทำในการปลูกผักสวนครัว ด้วยเทคนิคที่ต้องรู้ก่อนลงมือปลูกผัก...</p>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <?php }?>
    </div>
    <div class="text-center">
        <ul class="pagination" id="pageList">
            <!--<li><a href="#">«</a></li>-->
            <!--<li><a href="#">1</a></li>-->
            <!--<li><a href="#">2</a></li>-->
            <!--<li class="active"><a href="#">3</a></li>-->
            <!--<li><a href="#">4</a></li>-->
            <!--<li><a href="#">5</a></li>-->
            <!--<li><a href="#">»</a></li>-->
        </ul>
    </div>
</div>
       