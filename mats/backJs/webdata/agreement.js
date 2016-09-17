$(document).ready(function (){
    
    var oldData = $('#oldData');
    var updateBtn = $('#updateBtn');
    
    CKEDITOR.instances.mytextarea.setData(oldData.val());
    
    updateBtn.click(editAgreement);
    
    function editAgreement(){
        var content = CKEDITOR.instances.mytextarea.getData();
        
        param = {
            "agreement" : content
        };
        
        $.ajax({
            type : 'POST',
            url : webUrl + 'gnc_admin/webdata/edit_agreement_ajax',
            data : param
        }).done(function (data){
            if (data !== "1") {
                console.log(data);
                return;
            }
            
            location.reload();
        });
        
    }
    
});