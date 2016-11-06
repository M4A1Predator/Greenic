<article class="content forms-page">
    <div class="title-block">
        <h3 class="title">แก้ไขหน่วยตวงวัด</h3>
        <p class="title-description"> แก้ไขหน่วยตวงวัดทั้งหมด </p>
    </div>          
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                <div class="card card-block sameheight-item" style="height: 727px;">
                    <input type="hidden" id="unitId" value="<?=$unit->unit_id?>"/>
                    <!--<form>-->
                        <div class="form-group"> <label class="control-label">ชื่อหน่วย</label> 
                        <input type="text" id="unitName" class="form-control boxed" value="<?=$unit->unit_name?>"> </div>
                        <div class="form-group">
                            <button id="editBtn" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
                            <!--<button type="button" class="btn btn-danger"><i class="fa fa-times"></i> ยกเลิก</button> -->
                            <p><span id="resMsg"> </span></p>
                        </div>
                    <!--</form>-->
                </div>
            </div>          
        </div>
    </section>
</article>

<script>
    
    $('#editBtn').click(editUnit);
    
    function editUnit() {
        unitName = ($('#unitName').val()).trim();
        unitId = $('#unitId').val();
        
        param = {
            unit_name : unitName,
        };
        
        $.ajax({
            type : 'POST',
            url : adminWebUrl + 'unit/' + unitId + '/edit',
            data : param,
        }).done(function (data){
            console.log(data);
            if (data !== '1') {
                $('#resMsg').html(data);
                return;
            }
            
            $('#resMsg').html('แก้ไขเรียบร้อย');
        });
        
    }
</script>