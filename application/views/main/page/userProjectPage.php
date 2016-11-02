<div class="breadcrumbs">
     <div class="container">
         <h1 class="pull-left">โปรเจ็คของคุณ</h1>
         <ul class="pull-right breadcrumb">
             <li><a href="<?=base_url().'main'?>">หน้าแรก</a></li>
             <li class="active">โปรเจ็คของคุณ</li>
         </ul>
     </div>
 </div>
 <div class="container content-md">
    <div class="row margin-bottom-20">
        <div class="col-sm-4">
            <select class="form-control district" id="selectFarm">
                <option value="0">แสดงทุกฟาร์ม</option>
            </select>                                                    
        </div>
        <div class="col-sm-2">
            <a href="<?=base_url().'my_farm'?>" class="btn-u text-center" style="width: 100%;">จัดการฟาร์ม <i class="fa fa-thumb-tack"></i></a>                                            
        </div>
        <div class="col-sm-6">
            <select class="form-control district" id="selectType">
                <option value="0">แสดงทุกประเภท</option>
                <option value="1">ผัก</option>
                <option value="2">ผลไม้</option>
                <option value="3">สัตว์</option>
            </select>                                                    
        </div>
    </div>
    <div class="row projectList">
        <div class="col-md-3 col-sm-6 md-margin-bottom-40">
            <div class="easy-block-v2">
                <img alt="" src="<?=base_url()?>mats/assets/img/upload/project/0003.jpg">
                <h3>ผักบุ้งจีนเฟส#2</h3>
                <ul class="list-unstyled">
                    <li><span class="color-green">ประเภท:</span> ผัก / ผักบุ้ง</li>
                    <li><span class="color-green">ราคา:</span> 60 บาท/กิโลกรัม</li>
                    <li><span class="color-green">ฟาร์ม:</span> ไร่ลุงแดง</li>
                    <li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> ปากพลี, นครนายก</li>
                </ul>
                <a href="singleProduct.php" class="btn-u btn-u-sm">ดูโปรเจ็คนี้</a> <a href="editProject.php" class="btn-u btn-u-blue btn-u-sm"><i class="fa fa-pencil"></i></a> <a class="btn-u btn-u-red btn-u-sm"><i class="fa fa-trash-o"></i></a>
            </div>
        </div>
    </div>
    <div class="text-center">
        <input type="hidden" id="page" value="1">
        <ul class="pagination" id="projectPageList">
            <li><a href="#">«</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
 </div>
 
 <!-- Model -->
 <div class="modal fade bs-example-modal-sm" id="removeProject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-sm">
       <div class="modal-content">
           <form action="#" class="sky-form">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title" id="myModalLabel4">ลบโปรเจ็ค</h4>
           </div>
           <div class="modal-body">
               <div class="row">
                   <div class="col-md-12">
                       <section>
                           <label class="text">
                               <p>ต้องการลบโปรเจค <span id="removeProjectName"></span> ใช่หรือไม่?</p>
                           </label>
                       </section>
                   </div>
               </div>
<!--               <div class="row">
                   <div class="col-md-12">
                       <section>
                           <label class="input">
                               <p>กรุณาใส่รหัสผ่าน หากต้องการลบ</p>
                               <input type="text" id="memberPassword" />
                           </label>
                       </section>
                   </div>
               </div>-->
           </div>
           <div class="modal-footer">
               <button type="button" class="btn-u btn-u-primary" data-dismiss="modal"> ยกเลิก</button>
               <button type="button" class="btn-u btn-u-red" id="confirmRemoveBtn"><i class="fa fa-times" aria-hidden="true"></i> ลบ</button>
           </div>
           </form>
       </div>
   </div>
</div>
       