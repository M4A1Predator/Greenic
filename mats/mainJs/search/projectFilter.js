$(document).ready(function (){
    var projectProvince = $('#projectProvince');
    var projectDistrict = $('#projectDistrict');
    
    setProjectProvinces();
    projectProvince.change(setProjectDistricts);
    
    function setProjectProvinces() {
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