<article class="content forms-page">
                    <div class="title-block">
                        <h3 class="title">แก้ไขโปรเจ็ค</h3>
                    </div>
                    
                    <?php foreach($project_detail as $project){ ?>
                    <section class="section">
                        <div class="row sameheight-container">
                            <div class="col-md-12">
                                <div class="card card-block sameheight-item">
                                    <form>
                                        
                                        <div class="form-group row">
                                            <div class="col-xs-12"><label class="control-label">ชื่อสินค้า</label> <input type="text" class="form-control boxed" value="<?=$project->project_name ?>"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-12"><label class="control-label">ข้อมูลเกี่ยวกับสินค้า</label>
                                                <textarea rows="3" class="form-control" id="formGroupExampleInput7"><?=$project->project_detail  ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4">
                                                <label class="control-label">ชื่อสินค้า</label> 
                                                 <select class="form-control district">
                                                                           <option>เลือกประเภท</option>
                                                                            <option value="vegetable">ผัก</option>
                                                                            <option value="fruit">ผลไม้</option>
                                                                            <option value="animal">สัตว์</option>
                                                                        </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label">ชื่อสินค้า</label> 
                                                 <select class="form-control district">
                                                                           <option>เลือกชนิด</option>
                                                                            <option value="vegetable">ผัก</option>
                                                                            <option value="fruit">ผลไม้</option>
                                                                            <option value="animal">สัตว์</option>
                                                                        </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label">ชื่อสินค้า</label> 
                                                 <select class="form-control district">
                                                                           <option>เลือกสายพันธุ์</option>
                                                                            <option value="vegetable">ผัก</option>
                                                                            <option value="fruit">ผลไม้</option>
                                                                            <option value="animal">สัตว์</option>
                                                                        </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-md-2"><label class="control-label">หน่วยที่ขาย <a href="?page=addUnit">[เพิ่มหน่วย <i class="fa fa-plus"></i>]</a></label>
                                                <select class="form-control district">
                                                    <option>เลือกหน่วย</option>
                                                    <option value="unit001">กรัม</option>
                                                    <option value="unit002" selected>กิโลกรัม</option>
                                                    <option value="unit003">ตัน</option>
                                                </select>
                                            </div>
                                              <div class="col-md-2"><label class="control-label">ราคาต่อ <span class="unitColor"><?=$project->unit_name ?></span></label>
                                                <input type="text" class="form-control boxed" placeholder="ใส่เป็นตัวเลขอย่างเดียว" value="<?=$project->project_ppu ?>">
                                            </div>
                                            <div class="col-md-2"><label class="control-label">กำลังผลิต <span class="unitColor"><?=$project->unit_name ?></span></label>
                                                <input type="text" class="form-control boxed" placeholder="ใส่เป็นตัวเลขอย่างเดียว" value="<?=$project->project_quantity ?>">
                                            </div>
                                            <div class="col-md-2"><label class="control-label">สั่งซื้อขั้นต่ำ <span class="unitColor"><?=$project->unit_name ?></span></label>
                                                <input type="text" class="form-control boxed" placeholder="ใส่เป็นตัวเลขอย่างเดียว" value="<?=$project->project_lowest_order ?>">
                                            </div>
                                            <div class="col-md-4"><label class="control-label">วันที่พร้อมจำหน่าย <span class="unitColor"></span></label>
                                                <input type="text" class="form-control boxed" value="<?=$project->project_selldate ?>">
                                            </div>
                                           
                                        </div>
                                        <div class="form-group"> <label class="control-label">ช่องทางการจัดส่ง</label>
                                            <div> 
                                                <label><input class="checkbox" type="checkbox" checked><span>ไปรษณีย์ไทย</span></label> 
                                                <label><input class="checkbox" type="checkbox"><span>kerry express</span></label> 
                                                <label><input class="checkbox" type="checkbox"><span>จัดส่งเองถึงที่</span></label> 
                                                <label><input class="checkbox" type="checkbox" checked><span>มารับเอง</span></label> 
                                                <label><input class="checkbox" type="checkbox" checked><span>ตามตกลง</span></label> 
                                                <label><input class="checkbox" type="checkbox" checked><span>บริษัทขนส่งเอกชนอื่นๆ</span></label> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>ภาพหน้าปก</label> <?php  if($project->project_cover_image_path){ ?> <br/> <img src="<?=$project->project_cover_image_path?>" style="max-width:100%;">  <?php }else{ echo ': -';}  ?>
                                            <br/>
                                                * ไม่ต้องอัพโหลดภาพ ถ้าหากไม่ต้องการเปลี่ยนภาพหน้าปก<br/> 
                                            <input type="file" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
                                            <a href="?page=allProject" class="btn btn-danger"><i class="fa fa-times"></i> ยกเลิก</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
            </div>
            </section>
               <?php } ?>
            
            </article>
            