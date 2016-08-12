var farmName = $('#farm_name');
var selectProvince = $('#select_province');
var selectDistrict = $('#select_province');
var selectSubDistrict = $('#select_sub_district');
var farmAddress = $('#farm_address');
var addFarmBtn = $('#add_farm_btn');

addFarmBtn.click(addFarm);

function addFarm() {
    
    provinceName = $('#select_province option:selected').text();
    districtName = $('#select_district option:selected').text();
    
    console.log(farmName.val());
    //
    //return;
    param = {
        'province' : provinceName,
        'district' : districtName,
        'sub_district' : selectSubDistrict.val(),
        'farm_address': farmAddress.val(),
        'farm_name' : farmName.val()
    };
    
    $.ajax({
        type : 'POST',
        url : webUrl + 'member/add_farm_ajax',
        data : param,
    }).success(function (data){
        console.log(data);
    });
    
}

