<article class="content forms-page">
    <div class="title-block">
        <h3 class="title">เพิ่มหน่วยตวงวัด</h3>
        <p class="title-description"> เพิ่มหน่วยตวงวัดทั้งหมด </p>
    </div>          
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-12">
                
                <div class="card card-block sameheight-item" style="height: 727px;">
                    <form>
                        <div class="form-group"> <label class="control-label">ชื่อหน่วย</label> 
                        <input type="text" id="unitName" class="form-control boxed" placeholder="เช่น กิโลกรัม, กรัม, ตัน เป็นต้น"> </div>
                        <div class="form-group">
                            <a class="btn btn-secondary-outline" href="<?=base_url_admin().'units'?>"><i class="fa fa-chevron-left"></i> หน่วยทั้งหมด</a>
                            <button id="addUnitBtn" class="btn btn-primary"><i class="fa fa-plus"></i> เพิ่ม</button>
                        </div>
                    </form>
                    <span id="msg"> </span>
                </div>
            </div>
                
        </div>
    </section>

</article>

<script>
    var unitName = $('#unitName');
    
    unitName.bind('keypress', function (e){
        if (e.keyCode == 13) {
            e.preventDefault();
        }
        
    });
    
    $('#addUnitBtn').click(function (e){
        e.preventDefault();
        
        param = {
            unit_name : unitName.val(),
        };

        $.ajax({
            type : 'post',
            url : adminWebUrl + 'unit/add',
            data : param,
        }).done(function (data){
            if (data !== '1') {
                console.log(data);
                jsonData = JSON.parse(data);
                $('#msg').html('err ' + jsonData.err);
                return;
            }
            
            location.replace(adminWebUrl + 'units');
        });
    });
    
</script>