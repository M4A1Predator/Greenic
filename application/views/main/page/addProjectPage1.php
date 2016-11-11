<div class="container content-md">
    <form action="#" method="post" id="sky-form3" class="sky-form" novalidate="novalidate">
        <header><button type="button" class="btn btn-defualt btn-circle">1/3</button> เพิ่มสินค้าเกษตรอินทรีย์</header>

        <fieldset>
            <section>
                <label class="label"><strong>ชื่อสินค้าของคุณ</strong></label>
                <label class="input">
                    <i class="icon-append fa fa-tag"></i>
                    <input type="text" name="projectName" id="project_name">
                </label>
            </section>
            <div class="row">
                <section class="col-md-2 col-sm-4">
                            <label class="label"><strong>ประเภท</strong></label>
                        <label class="select">
                            <select name="project_type" id="project_type">
                                <option value="" selected="" disabled="">เลือกประเภท</option>
                                <option value="<?=$project_type_arr[0]->project_type_id?>">ผัก</option>
                                <option value="<?=$project_type_arr[1]->project_type_id?>">ผลไม้</option>
                                <option value="<?=$project_type_arr[2]->project_type_id?>">สัตว์</option>
                            </select>
                            <i></i>
                        </label>
                </section>
                <section class="col-md-2 col-sm-4">
                    <label class="label"><strong>ชนิด</strong> <button class="btn btn-xs rounded btn-success" data-toggle="modal" data-target="#addSubCategory" type="button">เพิ่มใหม่ <i class="fa fa-plus" aria-hidden="true"></i></button></label>
                        <label class="select">
                            <select name="category" id="project_category">
                                <option value="" selected="" disabled="">เลือกชนิด</option>
                            </select>
                            <i></i>
                    </label>
                </section>
                <section class="col-md-2 col-sm-4">
                            <label class="label"><strong>สายพันธุ์</strong> <button class="btn btn-xs rounded btn-success" data-toggle="modal" data-target="#addBreed" type="button">เพิ่มใหม่ <i class="fa fa-plus" aria-hidden="true"></i></button></label>
                        <label class="select">
                            <select name="gender" id="selectSubCategory">
                                <option value="" selected="" >ไม่มีสายพันธุ์</option>
                            </select>
                            <i></i>
                        </label>
                </section>
                <section class="col-md-6">
                        <label class="label"><strong>ฟาร์มที่ทำ</strong> <button class="btn btn-xs rounded btn-success" data-toggle="modal" data-target="#addFarm" type="button">เพิ่มฟาร์มใหม่ <i class="fa fa-plus" aria-hidden="true"></i></button></label>
                        <label class="select">
                            <select name="selectFarm" id="select_farm">
                                <option value="" selected="" disabled="">เลือกฟาร์ม</option>
                            </select>
                            <i></i>
                        </label>
                </section>
            </div>
            <section>
                <label class="label"><strong>ข้อมูลเกี่ยวกับสินค้า</strong></label>
                <label class="textarea">
                    <textarea rows="4" name="projectName" id="project_detail"></textarea>
                </label>
            </section>
            
        </fieldset>

        <footer>
            <a href="#" id="add_project1_btn" class="button">ขั้นตอนต่อไป <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </footer>

        
    </form>
</div>
<?php $this->load->view( 'main/inc/addProjectModal.php');?>
