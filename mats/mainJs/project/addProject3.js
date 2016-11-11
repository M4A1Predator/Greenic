var coverImage = $('#coverImage');
var agree = $('#agree');
var addProject3Btn = $('#addProject3Btn');

addProject3Btn.click(addProject3);

function addProject3(e) {
    e.preventDefault();
    
    if (agree.prop('checked') === false) {
        return;
    }
    
    uploadImage = coverImage.prop('files')[0];

    formData = new FormData();
    formData.append('cover_image', uploadImage);
    
    $.ajax({
        type: 'POST',
        url: webUrl + 'member/add_project_step3_ajax',
        //headers: {'X-CSRFToken': csrftoken},
        processData: false,
        contentType: false,
        data: formData,
        success: function(data){
            //console.log(data);
            if (data != "1") {
                console.log(data);
                console.log('not ok');
                return;
            }
            
            location.replace(webUrl);
        }
    });
}

coverImage.change(function (){
    
    f = coverImage.prop('files')[0];
    if (f) {
        $('#coverImageFileText').val(f.name);
    }
    
});
