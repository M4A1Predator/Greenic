var projectType = $('#project_type');
var projectCateogry = $('#project_category');

projectType.change(getCategory);

function getCategory() {
    
    projectCateogry.empty();
    projectCateogry.append('<option value="0">' + optionSelectCategoryText + '</option>');
    
    param = {
        'project_type_id' : projectType.val()
    };
    
    $.ajax({
        type : 'POST',
        url : webUrl + 'get_categories_ajax',
        data : param,
    }).success(function (data){
        jsonData = JSON.parse(data);
        refreshCategoryOption(jsonData);
    });
}

function refreshCategoryOption(categoryArray) {
    categoryArray.forEach(function (category){
        projectCateogry.append('<option value="'+ category.category_id +'">' + category.category_name + '</option>');
    });
}