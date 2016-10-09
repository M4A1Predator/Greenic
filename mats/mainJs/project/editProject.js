$(document).ready(function (){
    var projectType = $('#project_type');
    var projectCateogry = $('#project_category');
    var selectSubCategory = $('#selectSubCategory');
    var projectFarm = $('#select_farm');
    var projectName = $('#projectName');
    var projectDetail = $('#project_detail');
    var saveBtn = $('#saveBtn');
    
    var projectTypeText = $('.projectType');
    var masterCategoryText = $('.masterCategory');
    
    var selectUnit = $('#select_unit');
    var ppu = $('#ppu');
    var quantity = $('#quantity');
    var lowestOrder = $('#lowestOrder');
    var startDate = $('#startDate');
    var sellDate = $('#sellDate');
    
    var productUnitArr = $('.pUnit');
    
    
    // Init 
    setFarmOption();
    setCategoryOption();
    setUnitOption();
    setProductShipment();
    
    // Set callback;
    projectType.change(setCategoryOption);
    projectCateogry.change(setSubCategoryOption);
    selectUnit.change(changeUnit);
    
    saveBtn.click(function (e){
        e.preventDefault();
        editProject();
    });

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
    
    function setProductShipment() {
        
        $.ajax({
            type: 'GET',
            url : webUrl + 'get_project_shipments_ajax/' + $('#projectId').val(),
        }).done(function (data){
            jsonData = JSON.parse(data);
            jsonData.forEach(function (shipment){
                shipmentCheck = $('input[name="smw-' + shipment.shipment_id + '"]');
                shipmentCheck.prop('checked', true);
            });
        });
        
    }
    
    
    function editProject(){
        
        projectNameText = (projectName.val()).trim();
        if (!projectNameText) {
            return;
        }
        
        productStatusId = $('#productStatus').val();
        
        startDateText = getMySqlDateString(startDate.val());
        sellDateText = getMySqlDateString(sellDate.val());
        
        coverImageFile = $('#coverImage').prop('files')[0];
        
        formData = new FormData();
        formData.append('project_id', $('#projectId').val());
        formData.append('project_product_status_id', productStatusId);
        formData.append('project_name', projectNameText);
        formData.append('project_type_id', projectType.val());
        formData.append('project_category_id', projectCateogry.val());
        formData.append('project_breed_id', selectSubCategory.val());
        formData.append('project_detail', projectDetail.val());
        formData.append('project_farm_id', projectFarm.val());
        formData.append('project_unit_id', selectUnit.val());
        formData.append('project_ppu', ppu.val());
        formData.append('project_quantity', quantity.val());
        formData.append('project_lowest_order', lowestOrder.val());
        formData.append('project_startdate', startDateText);
        formData.append('project_selldate', sellDateText);
        formData.append('project_cover_image', coverImageFile);
        
        
        shipmentDict = {};
        $('.shipmentWay').each(function (){
            nameArray = $(this).prop('name');
            shipmentId = nameArray[nameArray.length - 1] + "";
            shipmentDict[shipmentId] = $(this).prop('checked');
        });
        shipmentEncoded = JSON.stringify(shipmentDict);
        console.log(shipmentDict);
        console.log(shipmentEncoded);
        formData.append('shipment', shipmentEncoded);
        
        // DEBUG
        formData.forEach(function (index, k){
            console.log(k + ' : ' + formData.get(k));
        });
        
        $.ajax({
            type : 'post',
            url : webUrl + 'member/edit_project_ajax',
            processData: false,
            contentType: false,
            data: formData,
        }).done(function (data){
            //console.log(data);
            if (data !== '1') {
                return;
            }
            
            location.reload();
        });
        
    }
    
});