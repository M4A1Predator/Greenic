<style>
    a.btn-u.btn-brd.btn-u.btn-u-lg.subCate.active{
        /*background-color : black;*/
    }
</style>

<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left" class="categoryNameText"></h1>
        <ul class="pull-right breadcrumb">
            <li><a href="<?=base_url().$this->lang->line('main')?>">หน้าแรก</a></li>
            <li><a href="<?=base_url().'category/'.$project_type_name?>"><?=get_project_type_thai_text($project_type_id)?>อินทรีย์</a></li>
            <li class="active categoryNameText"></li>
        </ul>
    </div>
</div>
<input type="hidden" id="categoryId" value="<?=$category_id?>" />
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
        <div id="categories">
            
        </div>
        <!--เมนูย่อย-->
        <div class="text-center"><button class="btn rounded btn-default" type="button">แสดงหมวดหมู่ย่อยเพิ่มเติม <i class="fa fa-caret-down" aria-hidden="true"></i></button></div>
        <!--จบเมนูย่อย-->
    </div>
    <!--สินค้ามาใหม่-->
    <div class="headline-center margin-bottom-20">
        <h2><?=get_project_type_thai_text($project_type_id)?>อินทรีย์ > <span class="color-green categoryNameText">ผักบุ้ง</span></h2>
    </div>
    <?php $this->load->view( 'main/inc/subCategoryFilter');?>
    <div class="row" id="projects">
        <!-- Begin Easy Block -->
        <!-- End Begin Easy Block -->
    </div>
    <div class="text-center">
        <ul class="pagination">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li class="active"><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
    <div class="text-center">
            <a class="btn-u rounded btn-u-dark-blue" href="#" data-toggle="modal" data-target=".compareShow"><i class="fa fa-balance-scale" aria-hidden="true"></i> เปรียบเทียบ</a>
    </div>
     <!--สินค้ามาใหม่-->
</div>
        
<!--Compare Modal-->
<div class="modal fade compareShow" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myLargeModalLabel2" class="modal-title">ตารางเปรียบเทียบ</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><div class="easy-block-v2">
                    <a href="singleProduct.php" class="linkFull"></a>
                    <div class="easy-bg-v2 rgba-default">มาใหม่</div>
                    <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0012.jpg">
                    <h3>ผักบุ้ง เพราะเมล็ด</h3>
                    <ul class="list-unstyled">							
                        <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> บ้านนา, นครนายก</li>
                    </ul>
                </div></th>
                            <th class="hidden-sm"><div class="easy-block-v2">
                    <a href="singleProduct.php" class="linkFull"></a>
                    <div class="easy-bg-v2 rgba-default">มาใหม่</div>
                    <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0011.jpg">
                    <h3>ผักบุ้ง บ่อซีเมนต์</h3>
                    <ul class="list-unstyled">
                        <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> บ้านนา, นครนายก</li>
                    </ul>
                </div></th>
                            <th><div class="easy-block-v2">
                    <a href="singleProduct.php" class="linkFull"></a>
                    <div class="easy-bg-v2 rgba-default">มาใหม่</div>
                    <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0006.jpg">
                    <h3>ผักบุ้งจีน ปลอดสาร</h3>
                    <ul class="list-unstyled">
                        <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> บ้านนา, นครนายก</li>
                    </ul>
                </div></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>90 บาท/กิโลกรัม</td>
                            <td>40 บาท/กิโลกรัม</td>
                            <td>80 บาท/กิโลกรัม</td>
                        </tr>
                        <tr>
                            <td><span class="color-green">พร้อมจำหน่าย:</span> 10/6/2559</td>
                            <td><span class="color-green">พร้อมจำหน่าย:</span> 3/6/2559</td>
                            <td><span class="color-green">พร้อมจำหน่าย:</span> 25/6/2559</td>
                        </tr>
                        <tr>
                            <td><img class="img-responsive" src="<?=base_url()?>mats/assets/img/verify.png" alt=""></td>
                            <td>-</td>
                            <td><img class="img-responsive" src="<?=base_url()?>mats/assets/img/verify.png" alt=""></td>
                        </tr>
                        <tr>
                            <td>   <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i></td>
                            <td>   <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i></td>
                            <td>   <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Compare Modal-->
       