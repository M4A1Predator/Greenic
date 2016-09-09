
var selectFarm = $('#selectFarm');
var selectType = $('#selectType');
var projectList = $('.projectList');
var projectPageList = $('#projectPageList');
var page = $('#page');
var pageBtn = $('.pageBtn');

setFarmOption();
setProjectsList();

selectFarm.change(function(){
    page.val(1);
    setProjectsList();
});
selectType.change(function(){
    page.val(1);
    setProjectsList();
});

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
    
    projectListLimit = 16;
    offset = (projectListLimit * parseInt(page.val())) - projectListLimit;
    projectPageList.empty();
    param = {
        'type_id' : typeId,
        'farm_id' : farmId,
        'limit' : projectListLimit,
        'offset' : offset
    };
    
    $.ajax({
        type : 'GET',
        url : webUrl + 'member/get_projects_ajax',
        data : param,
    }).success(function (data){
        //console.log(data);
        jsonData = JSON.parse(data);
        projectList.empty();
        
        projectArray = jsonData.result;
        projectCount = parseInt(jsonData.count);
        
        projectArray.forEach(function (project){
            
            projectUrl = webUrl + 'project/' + project.project_id;
            editProjectUrl = webUrl + 'my_project/' + project.project_id + '/step1';
            
            content = '<div class="col-md-3 col-sm-6 md-margin-bottom-40">' +
                '<div class="easy-block-v2">' +
                    '<img style="height: 170px;" alt="" src="'+ webUrl + project.project_cover_image_path + '">' + 
                    '<h3>' + project.project_name + '</h3>' + 
                    '<ul class="list-unstyled">' + 
                        '<li><span class="color-green">ประเภท:</span> ' + projectTypeThaiDict[project.project_type_name]  +  ' / ' + project.category_name +  '</li>' +
                        '<li><span class="color-green">ราคา:</span> ' + project.project_ppu + '  บาท/' + project.project_unit_name + ' </li>' +
                        '<li><span class="color-green">ฟาร์ม:</span> ' + project.farm_name + '</li>' +
                        '<li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> ' + project.farm_district + ', ' + project.farm_province + '</li>' +
                    '</ul>' +
                    '<a href="' + projectUrl + '" class="btn-u btn-u-sm">ดูโปรเจ็คนี้</a>' + 
                    //'<a href="' + editProjectUrl + '" class="btn-u btn-u-blue btn-u-sm"><i class="fa fa-pencil"></i></a> ' + 
                    '<a class="btn-u btn-u-red btn-u-sm"><i class="fa fa-trash-o"></i></a>' + 
                '</div>' +
            '</div>';
            
            projectList.append(content);
        });
        
        //projectPageList.append('<li class="active"><a href="#">1</a></li>');
        if (projectCount < projectListLimit) {
            
        }else{
            if (projectCount % limit === 0) {
                pageAmount = (projectCount / limit);
            }else{
                pageAmount = (projectCount / limit) + 1;
            }
            
            for(i=1;i<=pageAmount;i++){
                classActive = '';
                if (parseInt(page.val()) === i) {
                    classActive = 'active';
                }
                projectPageList.append('<li class="' + classActive + '"><a class="pageBtn" href="#">' + i + '</a></li>');
            }
            var pageBtn = $('.pageBtn');
            
            $('#projectPageList li').on('click', function (e){
                e.preventDefault();
                newPage = parseInt($(this).text());
                page.val(newPage);
                setProjectsList();
            });
            
        }
        
    });
}
