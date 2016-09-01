var postCaption = $('#postCaption');
var postFileName = $('#postFileName');
var postFile = $('#postFile');
var postDetail = $('#postDetail');
var updateTimelineBtn = $('#updateTimelineBtn');

postFile.change(setFileName);
updateTimelineBtn.click(updateTimeline);

function setFileName(){
    postImage = postFile.prop('files')[0];
    postFileName.val(postImage.name);
}

function updateTimeline(){
    
    postImage = postFile.prop('files')[0];
    if (!postImage) {
        return;
    }
    
    if (postCaption.val().trim() === '') {
        return;
    }
    
    formData = new FormData();
    formData.append('project_id', projectId.val());
    formData.append('post_caption', postCaption.val());
    formData.append('post_detail', postDetail.val());
    formData.append('post_image', postImage);
    
    $.ajax({
        type: 'POST',
        url: webUrl + 'member/add_project_post_ajax',
        //headers: {'X-CSRFToken': csrftoken},
        processData: false,
        contentType: false,
        data: formData,
        success: function(data){
            if (data != "1") {
                console.log(data);
                return;
            }
            
            location.reload();
        }
    });
}

