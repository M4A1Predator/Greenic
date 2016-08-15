var selectProjectType = $('#add_project_type');
var newCategory = $('#add_category');
var addCategoryBtn = $('#add_category_btn');

addCategoryBtn.click(addCategory);

function addCategory() {
    
    projectTypeId = selectProjectType.val();
    newCategoryName = newCategory.val().trim();
    
    //console.log('id ' + projectTypeId + ' , name : ' + newCategoryName);
    
    param = {
        'project_type_id' : projectTypeId,
        'category_name': newCategoryName
    };
    
    $.ajax({
        type: 'POST',
        url: webUrl + 'member_add/category_ajax',
        data: param
    }).success(function (data){
        if (data == '0') {
            return;
        }
        
        getCategory();
        $('#addSubCategory').modal('hide');
        
    });
    
}

function addSubCategory(){
    
}
