
var selectFarm = $('#selectFarm');
var selectType = $('#selectType');
var projectList = $('.projectList');

setFarmOption();
setProjectsList();

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
        //console.log(data);
        jsonData = JSON.parse(data);
        projectList.empty();
        
        jsonData.forEach(function (project){
            
            projectUrl = webUrl + 'project/' + project.project_id;
            
            content = '<div class="col-md-3 col-sm-6 md-margin-bottom-40">' +
                '<div class="easy-block-v2">' +
                    '<img alt="" src="'+ webUrl + project.project_cover_image_path + '">' + 
                    '<h3>' + project.project_name + '</h3>' + 
                    '<ul class="list-unstyled">' + 
                        '<li><span class="color-green">ประเภท:</span> ' + project.project_type_name +  ' / ' + project.category_name +  '</li>' +
                        '<li><span class="color-green">ราคา:</span> ' + project.project_ppu + '  บาท/' + project.project_unit_name + ' </li>' +
                        '<li><span class="color-green">ฟาร์ม:</span> ' + project.farm_name + '</li>' +
                        '<li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> ' + project.farm_district + ', ' + project.farm_province + '</li>' +
                    '</ul>' +
                    '<a href="' + projectUrl + '" class="btn-u btn-u-sm">ดูโปรเจ็คนี้</a>' + 
                    '<a href="editProject.php" class="btn-u btn-u-blue btn-u-sm"><i class="fa fa-pencil"></i></a> ' + 
                    '<a class="btn-u btn-u-red btn-u-sm"><i class="fa fa-trash-o"></i></a>' + 
                '</div>' +
            '</div>';
            
            projectList.append(content);
        });
        
    });
}
