<article class="content forms-page">
    <div class="title-block">
        <h3 class="title">เพิ่มชนิดผลผลิต</h3>
    </div>          
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                
                <div class="card card-block sameheight-item" style="height: 727px;">
                    <form>
                        <div class="form-group"> <label class="control-label">ชื่อชนิด</label> 
                        <input type="text" class="form-control boxed" placeholder="เช่น ผักบุ้ง, ผักคะน้า, มะม่วง เป็นต้น"> </div>
                        <div class="form-group">
                            <label class="control-label">ประเภท</label>
                            <select id="categoryTypeId" class="form-control district">
                                    <?php foreach($project_types as $project_type){ ?>
                                    <option value="<?=$project_type->project_type_id?>"><?=get_project_type_thai_text($project_type->project_type_id)?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="form-group"> <a class="btn btn-secondary-outline" href="<?=base_url().'gnc_admin/category/allCategory'?>"><i class="fa fa-chevron-left"></i> ชนิดทั้งหมด</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> เพิ่ม</button> </div>
                    </form>
                </div>
            </div>
                    
        </div>
    </section>
    
</article>