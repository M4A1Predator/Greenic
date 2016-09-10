var projectType = $('#project_type');
var projectCateogry = $('#project_category');
var selectSubCategory = $('#selectSubCategory');
var projectFarm = $('#select_farm');
var projectName = $('#project_name');
var projectDetail = $('#project_detail');
var addProject1Btn = $('#add_project1_btn');

var projectTypeText = $('.projectType');
var masterCategoryText = $('.masterCategory');

setFarmOption();
projectType.change(getCategory);
projectCateogry.change(setSubCategoryOption);
addProject1Btn.click(addProject1);

function getCategory() {
    
    projectTypeText.val(projectType.find('option:selected').text());
    
    projectCateogry.empty();
    projectCateogry.append('<option value="0">' + optionSelectCategoryText + '</option>');
    
    setSubCategoryOption();
    
    param = {
        'project_type_id' : projectType.val()
    };
    
    $.ajax({
        type : 'GET',
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

function setSubCategoryOption() {
    
    if (!projectType.val() || !projectCateogry.val()) {
        return;
    }
    
    masterCategoryText.val(projectCateogry.find('option:selected').text());
    
    selectSubCategory.empty();
    selectSubCategory.append('<option value="">' + optionSelectNoBreed + '</option>');
    
    param = {
        'category_id' : projectCateogry.val(),
    };
    
    $.ajax({
        type : 'GET',
        url : webUrl + 'breed/get_breeds_ajax',
        data : param
    }).success(function (data){
        jsonData = JSON.parse(data);
        breedArray = jsonData.result;
        breedArray.forEach(function (breed){
            selectSubCategory.append('<option value="'+ breed.breed_id +'">' + breed.breed_name + '</option>');
        });
    });
    
}

function setFarmOption(){
    
    projectFarm.empty();
    projectFarm.append('<option value="0" selected="" disabled="">' + optionSelectFarmText + '</option>');
    
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

    categoryId = projectCateogry.val();
    
    param = {
        "type_id" : projectType.val(),
        "category_id" : categoryId,
        "breed_id" : selectSubCategory.val(),
        "farm_id" : projectFarm.val(),
        "project_name" : projectName.val(),
        "project_detail" : projectDetail.val()
    };
    //console.log(param);
    //return;

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