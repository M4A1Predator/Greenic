var farmName = $('#farm_name');
var selectProvince = $('#select_province');
var selectDistrict = $('#select_district');
var selectSubDistrict = $('#select_sub_district');
var farmAddress = $('#farm_address');
var addFarmBtn = $('#add_farm_btn');


setProvinceOption();
addFarmBtn.click(addFarm);
selectProvince.change(setDistrictOption);


function setProvinceOption() {
    $.ajax({
        type : 'GET',
        url : webUrl + 'get_all_provinces_ajax',
    }).success(function (data){
        jsonData = JSON.parse(data);
        jsonData.forEach(function (province){
            selectProvince.append('<option value="'+ province.province_id +'">' + province.province_name + '</option>');
        });
    });
}

function setDistrictOption() {
    selectDistrict.empty();
    selectDistrict.append('<option value="0">เลือกอำเภอ/เขต</option>');
    
    param = {
        'province_id' : selectProvince.val()
    };
    
    $.ajax({
        type : 'POST',
        url : webUrl + 'get_districts_ajax',
        data : param,
    }).success(function (data){
        jsonData = JSON.parse(data);
        jsonData.forEach(function (district){
            selectDistrict.append('<option value="'+ district.district_id +'">' + district.district_name + '</option>');
        });
    });

}

function addFarm() {
    
    farmNameVal = farmName.val().trim();
    subDistrictVal = selectSubDistrict.val().trim();
    farmAddressVal = farmAddress.val().trim();
    
    if (farmNameVal === "") {
        return;
    }
    
    if (selectProvince.val() == "0") {
        return;
    }
    
    if (selectDistrict.val() == "0") {
        return;
    }
    
    if (subDistrictVal.length === 0) {
        return;
    }
    
    if (farmAddressVal.length === 0) {
        return;
    }
    
    provinceName = $('#select_province option:selected').text();
    districtName = $('#select_district option:selected').text();
    
    //console.log(farmNameVal, ' ', subDistrictVal);
    
    //return;
    param = {
        'province' : provinceName,
        'district' : districtName,
        'sub_district' : subDistrictVal,
        'farm_address': farmAddressVal,
        'farm_name' : farmNameVal
    };
    
    $.ajax({
        type : 'POST',
        url : webUrl + 'member/add_farm_ajax',
        data : param,
    }).success(function (data){
        console.log(data);
        $('#addFarm').modal('hide');
        setFarmOption();
    });
    
}

