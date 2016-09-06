$(document).ready(function (){
    
    var projectTypeId = $('#projectTypeId');
    var categories = $('#categories');
    var projects = $('#projects');
    var projectProvince = $('#projectProvince');
    var projectDistrict = $('#projectDistrict');
    
    var showMoreCategoryBtn= $('#showMoreCategoryBtn');
    
    var projectPageList = $('#projectPageList');
    var page = $('#page');
    var pageBtn = $('.pageBtn');
    
    categoryId = $('#categoryId');
    subCategorySelect = $('#subCategorySelect');
    sortProjectSelect = $('#sortProjectSelect');
    
    // Set up UI components
    setCategories();
    setSubCategories();
    setProjects();
    // Set filterer
    setProjectProvinces();
    projectProvince.change(setProjectDistricts);
    
    // Set callback function
    subCategorySelect.change(setProjects);
    sortProjectSelect.change(setProjects);
    
    
    function setCategories(){
    
        borderColorClass = 'btn-u';
        if (projectTypeId.val() == '1') {
            borderColorClass = 'btn-u';
        }else if (projectTypeId.val() == '2') {
            borderColorClass = 'btn-orange';
        }else if (projectTypeId.val() == '3') {
            borderColorClass = 'btn-brown';
        }
        
        limit = 8;
    
        param = {
            'project_type_id' : projectTypeId.val(),
            'limit' : limit,
        };
        
        $.ajax({
            type : 'GET',
            //url : webUrl + 'get_categories_ajax',
            url : webUrl + 'category/get_categories_ajax',
            data : param
        }).success(function (data){
            jsonData = JSON.parse(data);
            
            // Get data
            categoryArray = jsonData.result;
            categoryCount = parseInt(jsonData.count);
            
            // Add category to list
            categoryArray.forEach(function (category){
                // Set url
                categoryUrl = webUrl + 'category/' + $('#projectTypeName').val() + '/' + category.category_id;
                // Set class
                activeClass = '';
                // Set active if has selected category
                if ($('#categoryId').val() && category.category_id === $('#categoryId').val()) {
                    activeClass = 'active';
                    $('.categoryNameText').html(category.category_name);
                }
                
                // Set text
                nameText = category.category_name + ' (' + category.project_count + ')';
                
                content = '<div class="col-sm-6 col-md-3">' + 
                    '<a href="' + categoryUrl  + '"  class="btn-u btn-brd  btn-u-lg subCate ' + borderColorClass + ' ' + activeClass + '"> ' +
                    nameText + ' </a>' + 
                '</div>';
                
                categories.append(content);
                
            });
            
            // Set up show more button
            if (categoryCount < limit) {
                showMoreCategoryBtn.hide();
            }else{
                
            }
            
        });
    }
    
    function setSubCategories() {
        
        param = {
            'category_id' : categoryId.val(),
        };
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'breed/get_breeds_ajax',
            data : param
        }).success(function (data){
            //console.log(data);
            if (data === '0') {
                return;
            }
            jsonData = JSON.parse(data);
            breedArray = jsonData.result;
            
            breedArray.forEach(function (breed){
                subCategorySelect.append('<option value="' + breed.breed_id + '">' + breed.breed_name + '</option>');
            });
            
        });
        
    }
    
    function setProjects() {
        
        limit = 16;
        offset = (limit * parseInt(page.val())) - limit;
        projectPageList.empty();
        orderType = sortProjectSelect.val();
    
        param = {
            'category_id' : categoryId.val(),
            'limit' : limit,
            'offset' : offset,
            'order_type' : orderType,
        };
        
        if(subCategorySelect.val() !== "0"){
            param.breed_id = subCategorySelect.val();
        }else{
            param.breed_id = null;
        }
        
        $.ajax({
            type: 'GET',
            url : webUrl + 'category/get_projects_ajax',
            data : param
        }).success(function (data){
            // Get data from response and parse to JSON
            jsonData = JSON.parse(data);

            projectArray = jsonData.result;
            projectCount = jsonData.count;
            
            // Remove old list
            projects.empty();
            
            // Set project list
            projectArray.forEach(function (project, index){
                projectUrl = webUrl + 'project/' + project.project_id;
                
                if (project.breed_name) {
                    categoryText = project.category_name + ' - ' + project.breed_name;
                }else{
                    categoryText = project.category_name;
                }
                
                content = '<div class="col-md-3 col-sm-6">' + 
                        '<div class="easy-block-v2">' +
                            '<img style="height: 170px;" alt="" src="' + webUrl + project.project_cover_image_path + '">' + 
                            '<h3>' + project.project_name + '</h3>' + 
                            '<ul class="list-unstyled">' + 
                                '<li><span class="color-green">ประเภท:</span>' + projectTypeThaiDict[project.project_type_name] +  ' / ' + categoryText + '</li>' + 
                                '<li><span class="color-green">ราคา:</span>' + project.project_ppu + '  บาท/' + project.unit_name + '</li>' + 
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
            if (projectCount < limit) {
            
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
                    setProjects();
                });
            }
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