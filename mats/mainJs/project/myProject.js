
var selectFarm = $('#selectFarm');
var selectType = $('#selectType');

setFarmOption();
selectFarm.change(changeFarm);
selectType.change(changeType);

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
    
    
}