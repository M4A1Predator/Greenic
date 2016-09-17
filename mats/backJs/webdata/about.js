$(document).ready(function (){
    
    var oldData = $('#oldData');
    var updateBtn = $('#updateBtn');
    
    CKEDITOR.instances.mytextarea.setData(oldData.val());
    
    updateBtn.click(editAbout);
    
    function editAbout(){
        var content = CKEDITOR.instances.mytextarea.getData();
        
        param = {
            "about" : content
        };
        
        $.ajax({
            type : 'POST',
            url : webUrl + 'gnc_admin/webdata/edit_about_ajax',
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