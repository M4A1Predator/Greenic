<article class="content forms-page">
    <div class="title-block">
        <h3 class="title">เพิ่มสายพันธุ์</h3>
    </div>          
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                <input type="hidden" id="categoryId" value="<?=$category->category_id?>" />
                <div class="card card-block sameheight-item" style="height: 727px;">
                    <div class="form-group"> <label class="control-label">ชื่อสายพันธุ์</label> 
                    <input type="text" id="breedName" class="form-control boxed" placeholder="เช่น ผักบุ้งไทย, ผักบุ้งจีน เป็นต้น"> </div>
                    <div class="form-group">
                        <label class="control-label">ประเภท</label>
                            <input type="text" class="form-control boxed" value="<?=$category->category_name?>" disabled>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-secondary-outline" href="<?=base_url_admin().'category/'.$category->category_id.'/breeds'?>"><i class="fa fa-chevron-left"></i> <?=$category->category_name?>ทั้งหมด</a>
                        <button type="submit" id="addBreedBtn" class="btn btn-primary"><i class="fa fa-plus"></i> เพิ่ม</button>
                        <p><span id="resMsg"> </span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</article>

<script>
    
    $('#addBreedBtn').click(addBreed);
    
    function addBreed() {
        breedName = ($('#breedName').val()).trim();
        categoryId = $('#categoryId').val();
        
        param = {
            breed_name : breedName,
        };
        
        $.ajax({
            type : 'POST',
            url : adminWebUrl + 'category/' + categoryId + '/breed/add',
            data : param,
        }).done(function (data){
            //jsonData = JSON.parse(data);
            //if(jsonData.hasOwnProperty("err")){
            //    $('#resMsg').html(jsonData.err);
            //    return;
            //}
            if (data !== '1') {
                $('#resMsg').html(data);
                return;
            }
            
            location.replace(adminWebUrl + 'category/' + categoryId + '/breeds');
            
        });
        
    }
</script>