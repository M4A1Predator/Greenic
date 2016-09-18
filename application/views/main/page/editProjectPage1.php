
<input type="hidden" id="nowCategoryId" value="<?=$project->category_id?>">
<input type="hidden" id="nowBreedId" value="<?=$project->breed_id?>">
<input type="hidden" id="nowFarmId" value="<?=$project->farm_id?>">
<input type="hidden" id="nowUnitId" value="<?=$project->unit_id?>">

<div class="container content-md">
    <form action="#" method="post" id="sky-form3" class="sky-form" novalidate="novalidate">
        <header>แก้ไขโปรเจ็ค: ผักบุ้งจีน</header>
        
        <fieldset>
            
            <section>
                <label class="label"><strong>สถานะสินค้า</strong></label>
                <label class="select">
                            <select name="productStatus">
                                <option value="CATED0001" selected="">สินค้ารอจำหน่าย</option>
                                <option value="CATE0008" selected="" >สินค้าพร้อมจำหน่าย</option>
                                <option value="CATE0025">สินค้าหยุดจำหน่าย</option>
                            </select>
                            <i></i>
                        </label>
            </section>
            
            <section>
                <label class="label"><strong>ชื่อสินค้าของคุณ</strong></label>
                <label class="input">
                    <i class="icon-append fa fa-tag"></i>
                    <input type="text" name="projectName" id="projectName" value="<?=$project->project_name?>">
                </label>
            </section>
            <div class="row">
                <section class="col-md-2 col-sm-4">
                            <label class="label"><strong>ประเภท</strong></label>
                        <label class="select">
                            <select name="gender" id="project_type">
                                <option value="0" selected="" disabled="">เลือกประเภท</option>
                                <option value="1" <?=($project->project_type_id === '1')?'selected=""':''?>>ผัก</option>
                                <option value="2"<?=($project->project_type_id === '2')?'selected=""':''?> >ผลไม้</option>
                                <option value="3" <?=($project->project_type_id === '3')?'selected=""':''?> >สัตว์</option>
                            </select>
                            <i></i>
                        </label>
                </section>
                <section class="col-md-2 col-sm-4">
                            <label class="label"><strong>ชนิด</strong> <button class="btn btn-xs rounded btn-success" data-toggle="modal" data-target="#addSubCategory" type="button">เพิ่มใหม่ <i class="fa fa-plus" aria-hidden="true"></i></button></label>
                        <label class="select">
                            <select name="gender" id="project_category">
                            </select>
                            <i></i>
                        </label>
                </section>
                <section class="col-md-2 col-sm-4">
                            <label class="label"><strong>สายพันธุ์</strong> <button class="btn btn-xs rounded btn-success" data-toggle="modal" data-target="#addBreed" type="button">เพิ่มใหม่ <i class="fa fa-plus" aria-hidden="true"></i></button></label>
                        <label class="select">
                            <select name="gender" id="selectSubCategory">
                                <option value="" >ไม่มีสายพันธุ์</option>

                            </select>
                            <i></i>
                        </label>
                </section>
                <section class="col-md-6">
                        <label class="label"><strong>ฟาร์มที่ทำ</strong> <button class="btn btn-xs rounded btn-success" data-toggle="modal" data-target="#addFarm" type="button">เพิ่มฟาร์มใหม่ <i class="fa fa-plus" aria-hidden="true"></i></button></label>
                        <label class="select">
                            <select name="gender" id="select_farm">

                            </select>
                            <i></i>
                        </label>
                </section>
            </div>
            <section>
                <label class="label"><strong>ข้อมูลเกี่ยวกับสินค้า</strong></label>
                <label class="textarea">
                    <textarea rows="4" name="projectName" id="project_detail"><?=$project->project_detail?></textarea>
                </label>
            </section>
            
            <div class="row">
                <section class="col-md-2 col-sm-4">
                        <label class="label"><strong>หน่วยที่ขาย</strong> <button class="btn btn-xs rounded btn-success" data-toggle="modal" data-target="#addUnit" type="button">เพิ่มใหม่ <i class="fa fa-plus" aria-hidden="true"></i></button></label>
                        <label class="select">
                            <select name="gender" id="select_unit">
                                <option value="0" selected="" disabled="">เลือกหน่วย</option>
                            </select>
                            <i></i>
                        </label>
                </section>
                <section class="col-md-2 col-sm-4">
                        <label class="label"><strong>ราคาต่อ <span style="color:red" class="pUnit"><?=$project->unit_name?></span></strong></label>
                        <label class="input">
                            <input type="text" name="price" id="price" value="<?=$project->project_ppu?>">
                        </label>
                </section>
                <section class="col-md-2 col-sm-4">
                        <label class="label"><strong>กำลังผลิต <span style="color:red" class="pUnit"><?=$project->unit_name?></span></strong></label>
                        <label class="input">
                            <input type="text" name="productivity" id="productivity" value="<?=$project->project_quantity?>">
                        </label>
                </section>
                <section class="col-md-2 col-sm-4">
                        <label class="label"><strong>สั่งซื้อขั้นต่ำ <span style="color:red" class="pUnit"><?=$project->unit_name?></span></strong></label>
                        <label class="input">
                            <input type="text" name="minOrder" id="minOrder" value="<?=$project->project_lowest_order?>">
                        </label>
                </section>
                <section class="col-md-2 col-sm-4">
                        <label class="label"><strong>วันที่เริ่มทำ</strong></label>
                        <label class="input">
                        <i class="icon-append fa fa-calendar"></i>
                        <input type="text" name="date" id="date" value="<?=display_date_th($project->project_startdate)?>" class="hasDatepicker">
                    </label>
                </section>
                <section class="col-md-2 col-sm-4">
                        <label class="label"><strong>วันที่พร้อมจำหน่าย </strong></label>
                        <label class="input">
                        <i class="icon-append fa fa-calendar"></i>
                        <input type="text" name="date" id="date" value="<?=display_date_th($project->project_selldate)?>" class="hasDatepicker">
                    </label>
                </section>
            </div>
            <section>
                <label class="label"><strong>ช่องทางการจัดส่ง</strong></label>
                <div class="inline-group">

                    <label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>ไปรษณีย์ไทย</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>kerry express</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox-inline" checked=""><i></i>จัดส่งเองถึงที่</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>บริษัทขนส่งเอกชนอื่นๆ</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox-inline" checked=""><i></i>ตามตกลง</label>
                    <label class="checkbox"><input type="checkbox" name="checkbox-inline" checked=""><i></i>มารับเอง</label>
                </div>
            </section>
            <div class="row">
                <div class="col-md-12"><img class="img-responsive" src="assets/img/project-bg-1.jpg"></div>
                <section class="col col-6">
                    <label class="label"><strong>รูปประกอบ (รูปหลัก 1 รูป)</strong></label>
                    <section>
                        <label for="file" class="input input-file state-success">
                            <div class="button state-success"><input type="file" name="file" multiple="" onchange="this.parentNode.nextSibling.value = this.value" class="valid">เลือกไฟล์</div><input type="text" placeholder="กรุณาเลือกไฟล์" readonly="" class="valid">
                        </label>*เว้นไว้ถ้าไม่ต้องการเปลี่ยนรูป
                    </section>
                </section>
                <section class="col col-6">
                </section>
            
            </div>
        </fieldset>

        <footer>
            <a href="#" class="button">บันทึกการแก้ไข <i class="fa fa-save" aria-hidden="true"></i></a>
        </footer>

        
    </form>
</div>
<?php $this->load->view( 'main/inc/addProjectModal.php'); ?>