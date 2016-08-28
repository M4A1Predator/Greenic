var lastProjects = $('#lastProjects');

setLastProjects();

function setLastProjects() {
    
    param = 'limit=' + 8;
    param += '&project_type_id=' + 1;
    
    $.ajax({
        type : 'GET',
        url : webUrl  + 'category/get_last_projects_ajax',
        data : param
    }).success(function (data){
        jsonData = JSON.parse(data);
        
        //lastProjects.append('<div class="row">');
        jsonData.forEach(function (project, index){

            if (project.category_master_name) {
                categoryText = project.category_master_name + ' - ' + project.category_name;
            }else{
                categoryText = project.category_name;
            }
            
            projectUrl = webUrl + 'project/' + project.project_id;
            
            content = '<div class="col-md-3 col-sm-6">' + 
					'<div class="easy-block-v2">' + 
                        //'<a href="singleProduct.php" class="linkFull"></a>' + 
						'<div class="easy-bg-v2 rgba-default">มาใหม่</div>' +
						'<img style="height: 170px;" alt="" src="' + webUrl + project.project_cover_image_path + '">' + 
						'<h3>' + project.project_name + '</h3>' + 
						'<ul class="list-unstyled">' + 
							'<li><span class="color-green">ประเภท:</span>' + projectTypeThaiDict[project.project_type_name] +  ' / ' + categoryText + '</li>' + 
							'<li><span class="color-green">ราคา:</span>' + project.project_ppu + '  บาท/' + project.project_unit_name + '</li>' + 
                            '<li><span class="color-green">ฟาร์ม:</span> ' + project.farm_name + '</li>' + 
							'<li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> ' + project.farm_district + ', ' + project.farm_province + '</li>' + 
						'</ul>' + 
						'<a class="btn-u btn-u-sm" href="' + projectUrl +'">ดูโปรเจ็คนี้</a>' +
					'</div>' + 
				'</div>';
                
            //if (index % 4 === 1) {
            //    lastProjects.append('<div class="row">');
            //}
            
            lastProjects.append(content);
            
        });
        //lastProjects.append('</div>');
    });
}