$(document).ready(function() {
    
    var articleHeadline = $('#articleHeadline');
    var articleCoverImage = $('#articleCoverImage');
    
    $('#addArticleBtn').click(addArticle);
    
    function addArticle(){
        
        var content = CKEDITOR.instances.mytextarea.getData();
        
        uploadImage = articleCoverImage.prop('files')[0];
        formData = new FormData();
        formData.append('headline', articleHeadline.val());
        formData.append('content', content);
        if (uploadImage) {
            formData.append('article_cover_image', uploadImage);
        }
        
        $.ajax({
            type: 'POST',
            url: webUrl + 'gnc_admin/article/add_article_ajax',
            //headers: {'X-CSRFToken': csrftoken},
            processData: false,
            contentType: false,
            data: formData,
            success: function(data){
                if (data !== '1') {
                    console.log(data);
                    jsonData = JSON.parse(data);
                    $('#errorMsg').html(jsonData.error);
                    return;
                }
                
                location.replace(webUrl + 'gnc_admin/article/allArticle');
            }
        });

    }
  
});