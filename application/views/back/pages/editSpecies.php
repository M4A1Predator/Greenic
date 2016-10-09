<article class="content forms-page">
        <div class="title-block">
            <h3 class="title">แก้ไขชนิดผลผลิต</h3>
        </div>          
        <section class="section">
            <div class="row sameheight-container">
                <div class="col-md-12">
                    
                    <div class="card card-block sameheight-item" style="height: 727px;">
                        <input type="hidden" id="categoryId" value="<?=$category->category_id?>"/>
                        <!--<form>-->
                        <div class="form-group"> <label class="control-label">ชื่อชนิด</label> 
                        <input type="text" id="categoryName" class="form-control boxed" value="<?=$category->category_name?>"> </div>
                        <div class="form-group">
                            <label class="control-label">ประเภท</label>
                                <select id="categoryTypeId" class="form-control district">
                                        <?php foreach($project_types as $project_type){ ?>
                                        <option value="<?=$project_type->project_type_id?>" <?=($project_type->project_type_id == $category->category_project_type_id)?'selected':''?>><?=get_project_type_thai_text($project_type->project_type_id)?></option>
                                        <?php } ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <!--<p><span id="resMsg"> </span></p>-->
                        </div>
                        <div class="form-group">
                                <button type="button" id="editCategoryBtn" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
                                <a href="?page=allSpecies" class="btn btn-danger"><i class="fa fa-times"></i> ยกเลิก</a>
                                <p><span id="resMsg"> </span></p>
                        </div>
                        <!--</form>-->
                    </div>
                </div>
        </div>
        </section>

</article>

<script>
    
    $('#editCategoryBtn').click(editCategory);
    
    function editCategory(){
        
        categoryId = $('#categoryId').val();
        categoryName = $('#categoryName').val();
        categoryTypeId = $('#categoryTypeId').val();
        
        param = {
            category_name : categoryName,
            category_project_type_id : categoryTypeId,
        };
        
        $.ajax({
            type : 'POST',
            url : webUrl + 'gnc_admin/category/' + categoryId + '/edit',
            data : param,
        }).done(function (data){
            console.log(data);
            if (data !== '1') {
                $('#resMsg').html(data);
                return;
            }
            $('#resMsg').html('แก้ไขเรียบร้อย');
            $('#resMsg').val(data);
        });
        
    }
    
</script>