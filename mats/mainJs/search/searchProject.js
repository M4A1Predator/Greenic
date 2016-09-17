$(document).ready(function() {
    var searchKeyword = $('#searchKeyword');
    var searchBtn = $('#searchBtn');
    var selectSortProjectBy = $('#selectSortProjectBy');
    var searchProjects = $('#searchProjects');
    var projectProvince = $('#projectProvince');
    var projectDistrict = $('#projectDistrict');
    var filterAddressBtn = $('#filterAddressBtn');
    
    var page = $('#page');
    var projectPageList = $('#projectPageList');
    var limit = 16;
    
    // Init
    setSearchProjects();
    setProjectProvinces();
    projectProvince.change(setProjectDistricts);
    
    // Set callbacks
    selectSortProjectBy.change(setSearchProjects);
    
    function setSearchProjects() {
        
        keyword = searchKeyword.val();
        offset = (limit * parseInt(page.val())) - limit;
        orderType = selectSortProjectBy.val();
        
        param = {
            'keyword' : keyword,
            'limit' : limit,
            'offset' : offset,
            'order_type' : orderType,
        };
        
        if (projectProvince.val() !== "0") {
            param.project_province = projectProvince.find('option:selected').text();
        }
        if (projectDistrict.val() !== "0") {
            param.project_district = projectDistrict.find('option:selected').text();
        }
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'search/search_projects_ajax',
            data : param
        }).done(function (data){
            jsonData = JSON.parse(data);
            projectArray = jsonData.result;
            projectCount = jsonData.count;
            
            // Reset list
            searchProjects.empty();
            projectPageList.empty();
            
            // Set project list
            projectArray.forEach(function (project, index){
                projectUrl = webUrl + 'project/' + project.project_id;
                
                if (project.breed_name) {
                    categoryText = project.category_name + ' - ' + project.breed_name;
                }else{
                    categoryText = project.category_name;
                }
                
                if (!project.project_cover_image_path) {
                    project.project_cover_image_path = 'mats/assets/img/main/img9.jpg';
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
                        '</div>' + 
                    '</div>';
                    
                searchProjects.append(content);
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
                    setSearchProjects();
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
    
    filterAddressBtn.click(function (){
        setSearchProjects();
        $('#fillterBox').modal('toggle');
    });
    
});