var projectType = $('#project_type');
var projectCateogry = $('#project_category');
var projectFarm = $('#select_farm');
var projectName = $('#project_name');
var projectDetail = $('#project_detail');
var addProject1Btn = $('#add_project1_btn');

setFarmOption();
projectType.change(getCategory);
addProject1Btn.click(addProject1);

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

function setFarmOption(){
    
    projectFarm.empty();
    projectFarm.append('<option value="0" selected="" disabled="">เลือกฟาร์ม</option>');
    
    $.ajax({
        type : 'GET',
        url : webUrl + 'member/get_farms_ajax',
    }).success(function (data){
        jsonData = JSON.parse(data);
        jsonData.forEach(function (farm){
            projectFarm.append('<option value="'+ farm.farm_id +'">' + farm.farm_name + '</option>');
        });
    });
    
}

function addProject1(e){
    e.preventDefault();
    
    console.log('add');
    
    param = {
        "type_id" : projectType.val(),
        "category_id" : projectCateogry.val(),
        //"sub_category_id" : ,
        "farm_id" : projectFarm.val(),
        "project_name" : projectName.val(),
        "project_detail" : projectDetail.val()
    };
    
    $.ajax({
        type : 'POST',
        url : webUrl + 'member/add_project_step1_ajax',
        data : param,
    }).success(function (data){
        if (data == "0") {
            return;
        }
        console.log(data);
        location.replace(webUrl + 'add_project/step2');
    });
    
}