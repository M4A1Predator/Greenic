setMainProjectTypes();

function setMainProjectTypes(){
    $.ajax({
        type : 'GET',
        url : webUrl  + 'get_project_types_with_count_ajax',
    }).success(function (data){
        jsonData = JSON.parse(data);
        
        $('#vegetableTypeText').html( projectTypeThaiDict[jsonData[0].project_type_name] + ' (' + jsonData[0].project_count + ')' );
        $('#fruitTypeText').html( projectTypeThaiDict[jsonData[1].project_type_name] + ' (' + jsonData[1].project_count + ')' );
        $('#animalTypeText').html( projectTypeThaiDict[jsonData[2].project_type_name] + ' (' + jsonData[2].project_count + ')' );
    });
}