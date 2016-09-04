$(document).ready(function (){
    
    var projectTypeId = $('#projectTypeId');
    var categories = $('#categories');
    var projects = $('#projects');
    var projectProvince = $('#projectProvince');
    var projectDistrict = $('#projectDistrict');
    
    categoryId = $('#categoryId');
    subCategorySelect = $('#subCategorySelect');
    
    // Set up UI components
    setCategories();
    setSubCategories();
    setProjects();
    // Set filterer
    setProjectProvinces();
    projectProvince.change(setProjectDistricts);
    
    // Set callback function
    subCategorySelect.change(setProjects);
    
    function setCategories(){
    
        borderColorClass = 'btn-u';
        if (projectTypeId.val() == '1') {
            borderColorClass = 'btn-u';
        }else if (projectTypeId.val() == '2') {
            borderColorClass = 'btn-orange';
        }else if (projectTypeId.val() == '3') {
            borderColorClass = 'btn-brown';
        }
        
        param = 'project_type_id=' + projectTypeId.val();
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'get_categories_ajax',
            data : param
        }).success(function (data){
            jsonData = JSON.parse(data);
            
            // Add category to list
            jsonData.forEach(function (category){
                // Set url
                categoryUrl = webUrl + 'category/' + $('#projectTypeName').val() + '/' + category.category_id;
                // Set class
                activeClass = '';
                // Set active if has selected category
                if ($('#categoryId').val() && category.category_id === $('#categoryId').val()) {
                    activeClass = 'active';
                    console.log('get selected');
                    $('.categoryNameText').html(category.category_name);
                }
                
                content = '<div class="col-sm-6 col-md-3">' + 
                    '<a href="' + categoryUrl  + '"  class="btn-u btn-brd  btn-u-lg subCate ' + borderColorClass + ' ' + activeClass + '"> ' + category.category_name + ' </a>' + 
                '</div>';
                
                categories.append(content);
                
            });
            
        });
    }
    
    function setSubCategories() {
        
        param = {
            'category_master_id' : categoryId.val(),
        };
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'category/get_categories_ajax',
            data : param
        }).success(function (data){
            if (data === '0') {
                return;
            }
            
            jsonData = JSON.parse(data);
            
            jsonData.forEach(function (category){
                subCategorySelect.append('<option value="' + category.category_id + '">' + category.category_name + '</option>');
            });
            
        });
        
    }
    
    function setProjects() {
    
    param = {
        'category_id' : categoryId.val(),
        'limit' : 16,
        'offset' : 0
    };
    
    if(subCategorySelect.val() !== "0"){
        param.category_id = subCategorySelect.val();
    }
    
    $.ajax({
        type: 'GET',
        url : webUrl + 'category/get_projects_ajax',
        data : param
    }).success(function (data){
        // Get data from response and parse to JSON
        jsonData = JSON.parse(data);
        categoryArray = jsonData.result;
        projectCount = jsonData.count;
        
        // Remove old list
        projects.empty();
        
        // Set project list
        categoryArray.forEach(function (project, index){
            projectUrl = webUrl + 'project/' + project.project_id;
            
            if (project.category_master_name) {
                categoryText = project.category_master_name + ' - ' + project.category_name;
            }else{
                categoryText = project.category_name;
            }
            
            content = '<div class="col-md-3 col-sm-6">' + 
					'<div class="easy-block-v2">' +
						'<img style="height: 170px;" alt="" src="' + webUrl + project.project_cover_image_path + '">' + 
						'<h3>' + project.project_name + '</h3>' + 
						'<ul class="list-unstyled">' + 
							'<li><span class="color-green">ประเภท:</span>' + projectTypeThaiDict[project.project_type_name] +  ' / ' + categoryText + '</li>' + 
							'<li><span class="color-green">ราคา:</span>' + project.project_ppu + '  บาท/' + project.project_unit_name + '</li>' + 
                            '<li><span class="color-green">ฟาร์ม:</span> ' + project.farm_name + '</li>' + 
							'<li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span> ' + project.farm_district + ', ' + project.farm_province + '</li>' + 
						'</ul>' + 
						'<a class="btn-u btn-u-sm" href="' + projectUrl +'">ดูโปรเจ็คนี้</a>' +
                        ' <label class="checkbox-inline compareCheck"><input type="checkbox" id="inlineCheckbox1" value="option1" class="compair"> เปรียบเทียบ</label>' + 
					'</div>' + 
				'</div>';
                
            projects.append(content);
        });
        
        // Set pagination
        
        
    });
    
}
   
    function setProjectProvinces() {
        console.log('set up');
        $.ajax({
            type : 'GET',
            url : webUrl + 'get_all_provinces_ajax',
        }).success(function (data){
            jsonData = JSON.parse(data);
            //<option>เลือกจังหวัด</option>
            jsonData.forEach(function (province){
                projectProvince.append('<option value="'+ province.province_id +'">' + province.province_name + '</option>');
            });
            
            
        });
    }
    
    function setProjectDistricts() {
        projectDistrict.empty();
        projectDistrict.append('<option value="0">เลือกอำเภอ/เขต</option>');

        param = {
            'province_id' : projectProvince.val()
        };
        
        $.ajax({
            type : 'POST',
            url : webUrl + 'get_districts_ajax',
            data : param,
        }).success(function (data){
            jsonData = JSON.parse(data);
            jsonData.forEach(function (district){
                projectDistrict.append('<option value="'+ district.district_id +'">' + district.district_name + '</option>');
            });
        });
    }
    
});