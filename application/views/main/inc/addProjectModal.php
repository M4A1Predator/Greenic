
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
                            <label class="input">
                                <input class="projectType" value="" disabled="">
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
                       <label class="input">
                            <input class="projectType" value="" disabled="">
                            <i></i>
                        </label>
                       <label class="input">
                           <input class="masterCategory" value="" disabled="" />
                           <i></i>
                       </label>
                       <section>
                           <label class="input">
                               <input type="text" name="categoryName" id="subCategory" placeholder="กรอกขื่อสายพันธ์">
                           </label>
                       </section>
                   </div>
               </div>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn-u btn-u-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> ยกเลิก</button>
               <button type="button" id="addSubCategoryBtn" class="btn-u btn-u-primary"><i class="fa fa-plus"></i> เพิ่ม</button>
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
                       <label class="select">
                   <select class="form-control zone" id="select_sub_district">
                      <option>เลือกตำบล/แขวง</option>
                       <option value="คลองสาน">บางมด</option>
                       <option value="ทุ่งครุ">ทุ่งครุ</option>
                       <option value="บางแค">บางแค</option>
                       <option value="บางเขน">บางเขน</option>
                       <option value="มีนบุรี">มีนบุรี</option>
                    </select>
                        <i></i>
                       </label>
                    <!--<label class="input">
                        <input type="text" id="select_sub_district" placeholder="ตำบล/แขวง"/>
                    </label>-->
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
                               <input type="text" name="unitName" id="addUnitName" placeholder="กรอกขื่อหน่วย เช่น ตัน,กระสอบ">
                           </label>
                       </section>
                   </div>
               </div>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn-u btn-u-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> ยกเลิก</button>
               <button type="button" class="btn-u btn-u-primary" id="addUnitBtn"><i class="fa fa-plus"></i> เพิ่ม</button>
           </div>
           </form>
       </div>
   </div>
</div>

<!-- Edit farm -->
<div class="modal fade bs-example-modal-sm" id="editFarm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="#" class="sky-form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel4">แก้ไขฟาร์ม</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="input">
                            <label class="input">
                                <input type="text" name="farmName" id="farmName" value="ฟาร์มไร่ลุงแดง@นครนายก">
                            </label>
                        </label>
                        
                        <label class="select">
                            <select class="form-control province">
                                  <option value="">เลือกจังหวัด</option>
                                  
                                  <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                                <i></i>
                    </label>
                        
                    <label class="select">  
                    <select class="form-control district">
                       <option>เลือกอำเภอ/เขต</option>
                        <option value="คลองสาน">คลองสาน</option>
                        <option value="ทุ่งครุ" selected>ทุ่งครุ</option>
                        <option value="บางแค">บางแค</option>
                        <option value="บางเขน">บางเขน</option>
                        <option value="มีนบุรี">มีนบุรี</option>
                    </select><i></i>
                        </label>
                        <label class="select">
                    <select class="form-control zone">
                       <option>เลือกตำบล/แขวง</option>
                        <option value="คลองสาน">บางมด</option>
                        <option value="ทุ่งครุ">ทุ่งครุ</option>
                        <option value="บางแค">บางแค</option>
                        <option value="บางเขน">บางเขน</option>
                        <option value="มีนบุรี" selected>มีนบุรี</option>
                    </select><i></i>
                        </label>
                    <label class="input">
                            <label class="input">
                                <input type="text" name="homeNum" id="homeNum" value="199/21 ม.8">
                            </label>
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-u btn-u-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> ยกเลิก</button>
                <button type="button" class="btn-u btn-u-primary"><i class="fa fa-save"></i> บันทึก</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /editFarm -->