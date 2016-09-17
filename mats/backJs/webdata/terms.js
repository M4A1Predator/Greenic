$(document).ready(function (){
    
    var oldData = $('#oldData');
    var updateBtn = $('#updateBtn');
    
    CKEDITOR.instances.mytextarea.setData(oldData.val());
    
    updateBtn.click(editTerms);
    
    function editTerms(){
        var content = CKEDITOR.instances.mytextarea.getData();
        
        param = {
            "terms" : content
        };
        
        $.ajax({
            type : 'POST',
            url : webUrl + 'gnc_admin/webdata/edit_terms_ajax',
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