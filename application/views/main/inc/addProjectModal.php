
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
                                 <option>เลือกจังหวัด</option>
                                 <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                 <option value="กระบี่">กระบี่ </option>
                                 <option value="กาญจนบุรี">กาญจนบุรี </option>
                                 <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                 <option value="กำแพงเพชร">กำแพงเพชร </option>
                                 <option value="ขอนแก่น">ขอนแก่น</option>
                                 <option value="จันทบุรี">จันทบุรี</option>
                                 <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                                 <option value="ชัยนาท">ชัยนาท </option>
                                 <option value="ชัยภูมิ">ชัยภูมิ </option>
                                 <option value="ชุมพร">ชุมพร </option>
                                 <option value="ชลบุรี">ชลบุรี </option>
                                 <option value="เชียงใหม่">เชียงใหม่ </option>
                                 <option value="เชียงราย">เชียงราย </option>
                                 <option value="ตรัง">ตรัง </option>
                                 <option value="ตราด">ตราด </option>
                                 <option value="ตาก">ตาก </option>
                                 <option value="นครนายก">นครนายก </option>
                                 <option value="นครปฐม">นครปฐม </option>
                                 <option value="นครพนม">นครพนม </option>
                                 <option value="นครราชสีมา">นครราชสีมา </option>
                                 <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                 <option value="นครสวรรค์">นครสวรรค์ </option>
                                 <option value="นราธิวาส">นราธิวาส </option>
                                 <option value="น่าน">น่าน </option>
                                 <option value="นนทบุรี">นนทบุรี </option>
                                 <option value="บึงกาฬ">บึงกาฬ</option>
                                 <option value="บุรีรัมย์">บุรีรัมย์</option>
                                 <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                 <option value="ปทุมธานี">ปทุมธานี </option>
                                 <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                 <option value="ปัตตานี">ปัตตานี </option>
                                 <option value="พะเยา">พะเยา </option>
                                 <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                 <option value="พังงา">พังงา </option>
                                 <option value="พิจิตร">พิจิตร </option>
                                 <option value="พิษณุโลก">พิษณุโลก </option>
                                 <option value="เพชรบุรี">เพชรบุรี </option>
                                 <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                 <option value="แพร่">แพร่ </option>
                                 <option value="พัทลุง">พัทลุง </option>
                                 <option value="ภูเก็ต">ภูเก็ต </option>
                                 <option value="มหาสารคาม">มหาสารคาม </option>
                                 <option value="มุกดาหาร">มุกดาหาร </option>
                                 <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                 <option value="ยโสธร">ยโสธร </option>
                                 <option value="ยะลา">ยะลา </option>
                                 <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                 <option value="ระนอง">ระนอง </option>
                                 <option value="ระยอง">ระยอง </option>
                                 <option value="ราชบุรี">ราชบุรี</option>
                                 <option value="ลพบุรี">ลพบุรี </option>
                                 <option value="ลำปาง">ลำปาง </option>
                                 <option value="ลำพูน">ลำพูน </option>
                                 <option value="เลย">เลย </option>
                                 <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                 <option value="สกลนคร">สกลนคร</option>
                                 <option value="สงขลา">สงขลา </option>
                                 <option value="สมุทรสาคร">สมุทรสาคร </option>
                                 <option value="สมุทรปราการ">สมุทรปราการ </option>
                                 <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                 <option value="สระแก้ว">สระแก้ว </option>
                                 <option value="สระบุรี">สระบุรี </option>
                                 <option value="สิงห์บุรี">สิงห์บุรี </option>
                                 <option value="สุโขทัย">สุโขทัย </option>
                                 <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                 <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                 <option value="สุรินทร์">สุรินทร์ </option>
                                 <option value="สตูล">สตูล </option>
                                 <option value="หนองคาย">หนองคาย </option>
                                 <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                 <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                 <option value="อุดรธานี">อุดรธานี </option>
                                 <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                 <option value="อุทัยธานี">อุทัยธานี </option>
                                 <option value="อุบลราชธานี">อุบลราชธานี</option>
                                 <option value="อ่างทอง">อ่างทอง </option>
                                 <option value="อื่นๆ">อื่นๆ</option>
                               </select>
                               <i></i>
                    </label>
                       
                    <label class="select">  
                        <select class="form-control district" id="select_district">
                            <option>เลือกอำเภอ/เขต</option>
                            <option value="คลองสาน">คลองสาน</option>
                            <option value="ทุ่งครุ">ทุ่งครุ</option>
                            <option value="บางแค">บางแค</option>
                            <option value="บางเขน">บางเขน</option>
                            <option value="มีนบุรี">มีนบุรี</option>
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
               <button type="button" class="btn-u btn-u-primary"><i class="fa fa-plus"></i> เพิ่ม</button>
           </div>
           </form>
       </div>
   </div>
</div>     