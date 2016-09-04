$(document).ready(function (){
    
    var projectTypeId = $('#projectTypeId');
    var categories = $('#categories');
    
    setCategories();
    
    function setCategories(){
    
        borderColorClass = 'btn-u';
        if (projectTypeId.val() == '1') {
            borderColorClass = 'btn-u';
        }else if (projectTypeId.val() == '2') {
            borderColorClass = 'btn-orange';
        }else if (projectTypeId.val() == '3') {
            borderColorClass = 'btn-brown';
        }
        
        param = 'project_type_id=' + projectTypeId.val();
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'get_categories_ajax',
            data : param
        }).success(function (data){
            jsonData = JSON.parse(data);
            
            // Add category to list
            jsonData.forEach(function (category){
                // Set url
                categoryUrl = webUrl + 'category/' + $('#projectTypeName').val() + '/' + category.category_id;
                // Set class
                activeClass = '';
                // Set active if has selected category
                if ($('#categoryId').val() && category.category_id === $('#categoryId').val()) {
                    activeClass = 'active';
                    console.log('get selected');
                    $('.categoryNameText').html(category.category_name);
                }
                
                content = '<div class="col-sm-6 col-md-3">' + 
                    '<a href="' + categoryUrl  + '"  class="btn-u btn-brd  btn-u-lg subCate ' + borderColorClass + ' ' + activeClass + '"> ' + category.category_name + ' </a>' + 
                '</div>';
                
                categories.append(content);
                
            });
            
        });
    }
});