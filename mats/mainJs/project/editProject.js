$(document).ready(function (){
    var projectType = $('#project_type');
    var projectCateogry = $('#project_category');
    var selectSubCategory = $('#selectSubCategory');
    var projectFarm = $('#select_farm');
    var projectName = $('#project_name');
    var projectDetail = $('#project_detail');
    var addProject1Btn = $('#add_project1_btn');
    
    var projectTypeText = $('.projectType');
    var masterCategoryText = $('.masterCategory');
    
    var selectUnit = $('#select_unit');
    var ppu = $('#ppu');
    var quantity = $('#quantity');
    var lowestOrder = $('#lowest_order');
    var startDate = $('#startDate');
    var sellDate = $('#sell_date');
    
    var productUnitArr = $('.pUnit');
    
    
    // Init 
    setFarmOption();
    setCategoryOption();
    setUnitOption();
    
    // Set callback;
    projectType.change(setCategoryOption);
    projectCateogry.change(setSubCategoryOption);
    
    selectUnit.change(changeUnit);

    function setCategoryOption() {
        
        projectTypeText.val(projectType.find('option:selected').text());
        
        projectCateogry.empty();
        //projectCateogry.append('<option value="0">' + optionSelectCategoryText + '</option>');
        
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
            jsonData.forEach(function (category){
                selected = '';
                if (category.category_id == $('#nowCategoryId').val()) {
                    selected = 'selected=""';
                }
                projectCateogry.append('<option value="'+ category.category_id +'"' + selected + '>' + category.category_name + '</option>');
            });
        });
    }
    
    function setSubCategoryOption(){
        
        projectCategoryId = projectCateogry.val();
        if (!projectCateogry.val()) {
            projectCategoryId = $('#nowCategoryId').val();
        }
        
        masterCategoryText.val(projectCateogry.find('option:selected').text());
        
        selectSubCategory.empty();
        selectSubCategory.append('<option value="">' + optionSelectNoBreed + '</option>');
        
        param = {
            'category_id' : projectCategoryId,
        };
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'breed/get_breeds_ajax',
            data : param
        }).success(function (data){
            jsonData = JSON.parse(data);
            breedArray = jsonData.result;
            breedArray.forEach(function (breed){
                selected = '';
                if (breed.breed_id == $('#nowBreedId').val()) {
                    selected = 'selected=""';
                }
                selectSubCategory.append('<option value="'+ breed.breed_id + '"' + selected + '>' + breed.breed_name + '</option>');
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
                
                // Check cur farm
                selected = '';
                if (farm.farm_id == $('#nowFarmId').val()) {
                    selected = 'selected=""';
                }
                projectFarm.append('<option value="'+ farm.farm_id +'" ' + selected +  '>' + farm.farm_name + '</option>');
            });
        });
        
    }
    
    function setUnitOption(){
        selectUnit.empty();
        selectUnit.append('<option value="0" selected="" disabled="">เลือกหน่วย</option>');
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'get_all_units_ajax',
        }).success(function (data){
            jsonData = JSON.parse(data);
            
            jsonData.forEach(function (unit){
                selected = '';
                if (unit.unit_id == $('#nowUnitId').val()) {
                    selected = 'selected=""';
                }
                selectUnit.append('<option value="' + unit.unit_id + '" ' + selected + '>' + unit.unit_name + '</option>');
            });
        });
    }
    
    function changeUnit() {
        if (selectUnit.val() === 0) {
            return;
        }
        unitName = $('#select_unit option:selected').text();
        
        productUnitArr.html(unitName);
    }
    
});