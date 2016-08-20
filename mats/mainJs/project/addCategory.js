var selectProjectType = $('#add_project_type');
var newCategory = $('#add_category');
var addCategoryBtn = $('#add_category_btn');

var subCategory = $('#subCategory');
var addSubCategoryBtn = $('#addSubCategoryBtn');

addCategoryBtn.click(addCategory);
addSubCategoryBtn.click(addSubCategory);

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
    
    if (!projectCateogry.val()) {
        return;
    }
    
    if (!projectType.val()) {
        return;
    }
    
    console.log(projectCateogry.find('option:selected').text());
    
    param = {
        'category_name' : subCategory.val(),
        'category_master_id' : projectCateogry.val(),
        'project_type_id' : projectType.val(),
    };
    
    //console.log(param);
    
    $.ajax({
        type: 'POST',
        url: webUrl + 'member_add/category_ajax',
        data: param
    }).success(function (data){
        console.log(data);
        if (data != '1') {
            return;
        }
        
        //getCategory();
        $('#addBreed').modal('hide');
        
    });
    
}
