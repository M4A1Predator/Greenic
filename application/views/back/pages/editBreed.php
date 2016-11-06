<article class="content forms-page">
    <div class="title-block">
        <h3 class="title">แก้ไขสายพันธุ์</h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                
                <div class="card card-block sameheight-item" style="height: 727px;">
                    <input type="hidden" id="breedId" value="<?=$breed->breed_id?>" />
                    <input type="hidden" id="categoryId" value="<?=$breed->breed_category_id?>" />
                    <div class="form-group"> <label class="control-label">ชื่อสายพันธุ์</label> 
                    <input type="text" id="breedName" class="form-control boxed" value="<?=$breed->breed_name?>"> </div>
                    <div class="form-group">
                        <label class="control-label">ประเภท</label>
                        <select class="form-control district" disabled>
                            <option value="vegetable" selected><?=get_project_type_thai_text($breed->category_project_type_id)?></option>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label class="control-label">ชนิด</label>
                        <select class="form-control district" >
                            <option value="br01" selected><?=$breed->category_name?></option>
                        </select>
                    </div>
                    
                     <div class="form-group">
                        <button type="submit" id="editBreedBtn" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
                        <a href="<?=base_url_admin().'category/'.$breed->breed_category_id.'/breeds'?>" class="btn btn-danger"><i class="fa fa-times"></i> กลับ</a>
                        <p><span id="resMsg"> </span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</article>
<script>
    
    $('#editBreedBtn').click(editBreed);
    
    function editBreed() {
        breedName = ($('#breedName').val()).trim();
        breedId = $('#breedId').val();
        categoryId = $('#categoryId').val();
        
        param = {
            breed_name : breedName,
        };
        
        $.ajax({
            type : 'POST',
            url : adminWebUrl + 'category/' + categoryId + '/breed/' + breedId + '/edit',
            data : param,
        }).done(function (data){
            if (data !== '1') {
                $('#resMsg').html(data);
                return;
            }
            
            $('#resMsg').html('แก้ไขเรียบร้อย');
            
        });
        
    }
</script>