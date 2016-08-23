
var selectFarm = $('#selectFarm');
var selectType = $('#selectType');
var projectList = $('.projectList');
setFarmOption();
selectFarm.change(setProjectsList);
selectType.change(setProjectsList);

function setFarmOption() {
    
    $.ajax({
        type: 'GET',
        url: webUrl + 'member/get_farms_ajax',
    }).success(function (data){
        jsonData = JSON.parse(data);
        
        jsonData.forEach(function (farm){
            selectFarm.append('<option value=' + farm.farm_id + '>' + farm.farm_name + '</option>');
        });

    });
    
}

function changeFarm() {
    
}

function changeType() {
    
}

function setProjectsList() {
    farmId = selectFarm.val();
    typeId = selectType.val();

    param = {
        'type_id' : typeId,
        'farm_id' : farmId
    };
    
    $.ajax({
        type : 'POST',
        url : webUrl + 'member/get_projects_ajax',
        data : param,
    }).success(function (data){
        console.log(data);
        jsonData = JSON.parse(data);
        projectList.empty();
    });
}
