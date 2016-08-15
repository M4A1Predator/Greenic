
<!--add SubCategory-->
<div class="modal fade bs-example-modal-sm" id="addSubCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="#" class="sky-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel4">เพิ่มชนิดใหม่</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="select">
                                <select name="category" id="add_project_type">
                                    <option value="0" selected="">เลือกประเภท</option>
                                    <option value="1">ผัก</option>
                                    <option value="2">ผลไม้</option>
                                    <option value="3">สัตว์</option>
                                </select>
                                <i></i>
                            </label>
                            <section>
                                <label class="input">
                                    <input type="text" name="subCategoryName" id="add_category" placeholder="กรอกขื่อประเภท">
                                </label>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-u btn-u-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> ยกเลิก</button>
                    <button type="button" id="add_category_btn" class="btn-u btn-u-primary"><i class="fa fa-plus"></i> เพิ่ม</button>
                </div>
            </form>
        </div>
    </div>
</div>                               

<!--add breed-->
<div class="modal fade bs-example-modal-sm" id="addBreed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-sm">
       <div class="modal-content">
           <form action="#" class="sky-form">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title" id="myModalLabel4">เพิ่มหมวดหมู่</h4>
           </div>
           <div class="modal-body">
               <div class="row">
                   <div class="col-md-12">
                       <label class="select">
                           <select name="category">
                               <option value="0" selected="" disabled="">เลือกประเภท</option>
                               <option value="1">ผัก</option>
                               <option value="2">ผลไม้</option>
                               <option value="3">สัตว์</option>
                           </select>
                           <i></i>
                       </label>
                       <label class="select">
                           <select name="subcategory">
                               <option value="0" selected="" disabled="">เลือกชนิด</option>
                               <option value="CATED0001">ผักคะน้า</option>
                               <option value="CATE0008">ผักบุ้ง</option>
                               <option value="CATE0025">ถั่วฝักยาว</option>
                           </select>
                           <i></i>
                       </label>
                       <section>
                           <label class="input">
                               <input type="text" name="categoryName" id="categoryName" placeholder="กรอกขื่อสายพันธ์">
                           </label>
                       </section>
                   </div>
               </div>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn-u btn-u-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> ยกเลิก</button>
               <button type="button" class="btn-u btn-u-primary"><i class="fa fa-plus"></i> เพิ่ม</button>
           </div>
           </form>
       </div>
   </div>
</div>
<!--add Farm-->
<div class="modal fade bs-example-modal-sm" id="addFarm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-sm">
       <div class="modal-content">
           <form action="#" class="sky-form">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title" id="myModalLabel4">เพิ่มฟาร์มใหม่</h4>
           </div>
           <div class="modal-body">
               <div class="row">
                   <div class="col-md-12">
                       <label class="input">
                           <label class="input">
                               <input type="text" name="farmName" id="farm_name" placeholder="ชื่อฟาร์ม">
                           </label>
                       </label>
                       
                       <label class="select">
                            <select class="form-control province" id="select_province">
                                <option value="0">เลือกจังหวัด</option>
                            </select>
                            <i></i>
                        </label>
                       
                    <label class="select">  
                        <select class="form-control district" id="select_district">
                            <option value="0">เลือกอำเภอ/เขต</option>
                        </select><i></i>
                    </label>
                       <!--<label class="select">-->
                   <!--<select class="form-control zone" id="select_sub_district">
                      <option>เลือกตำบล/แขวง</option>
                       <option value="คลองสาน">บางมด</option>
                       <option value="ทุ่งครุ">ทุ่งครุ</option>
                       <option value="บางแค">บางแค</option>
                       <option value="บางเขน">บางเขน</option>
                       <option value="มีนบุรี">มีนบุรี</option>
                    </select>-->
                        <!--<i></i>-->
                       <!--</label>-->
                    <label class="input">
                        <input type="text" id="select_sub_district" placeholder="ตำบล/แขวง"/>
                    </label>
                   <label class="input">
                        <label class="input">
                            <input type="text" name="homeNum" id="farm_address" placeholder="บ้านเลขที่ หมู่ที่">
                        </label>
                    </label>
                   </div>
               </div>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn-u btn-u-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> ยกเลิก</button>
               <button type="button" id="add_farm_btn" class="btn-u btn-u-primary"><i class="fa fa-plus"></i> เพิ่ม</button>
           </div>
           </form>
       </div>
   </div>
</div>

<!--add Unit-->
<div class="modal fade bs-example-modal-sm" id="addUnit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-sm">
       <div class="modal-content">
           <form action="#" class="sky-form">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title" id="myModalLabel4">เพิ่มหน่วยใหม่</h4>
           </div>
           <div class="modal-body">
               <div class="row">
                   <div class="col-md-12">
                       <section>
                           <label class="input">
                               <input type="text" name="unitName" id="unitName" placeholder="กรอกขื่อหน่วย เช่น ตัน,กระสอบ">
                           </label>
                       </section>
                   </div>
               </div>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn-u btn-u-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> ยกเลิก</button>
               <button type="button" class="btn-u btn-u-primary" id="add_unit_btn"><i class="fa fa-plus"></i> เพิ่ม</button>
           </div>
           </form>
       </div>
   </div>
</div>     