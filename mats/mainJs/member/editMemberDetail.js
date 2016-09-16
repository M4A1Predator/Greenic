
var firstname = $('#edit-firstname');
var lastname = $('#edit-lastname');
var address = $('#edit-address');
var province = $('#edit-province');
var district = $('#edit-district');
var subDistrict = $('#edit-sub-district');
var newPassword = $('#newPassword');
var reNewPassword = $('#reNewPassword');
var email = $('#edit-email');
var image = $('#edit-img');

var saveBtn = $('#save-btn');

saveBtn.click(saveDetail);
province.change(getDistrict);
district.change(getSubDistrict);
image.change(function (){
    fileName = image.prop('files')[0].name;
    $('#editImgName').val(fileName);
});

function getDistrict() {
    
    subDistrict.empty();
    subDistrict.append('<option value="">' + subDistrictDefautlText + '</option>');
    console.log('Pro id ' + province.val());
    $.ajax({
        type: 'POST',
        url: webUrl + 'get_districts_ajax',
        data: {'province_id': province.val()},
        success: function(data){
            jsonData = JSON.parse(data);
            
            district.empty();
            district.append('<option value="">' + districtDefautlText + '</option>');
            
            for(i=0;i<jsonData.length;i++){
                curDistrict = jsonData[i];
                district.append('<option value="'+ curDistrict.district_id +'">' + curDistrict.district_name + '</option>');
            }
        }
    });
}

function getSubDistrict(){
    
    subDistrict.empty();
    subDistrict.append('<option value="">เลือกตำบล</option>');
    
    $.ajax({
        type: 'GET',
        url: webUrl + 'get_sub_district_ajax',
        data: {'district_id': district.val(), 'province_id': province.val()},
        success: function(data){
            jsonData = JSON.parse(data);
            console.log(district.val() + '  ' + province.val() );
            subDistrict.empty();
            subDistrict.append('<option>' + subDistrictDefautlText + '</option>');
            
            for(i=0;i<jsonData.length;i++){
                curSubDistrict = jsonData[i];
                subDistrict.append('<option value="'+ curSubDistrict.sub_district_id +'">' + curSubDistrict.sub_district_name + '</option>');
            }
        }
    });
}

function saveDetail(e) {
    e.preventDefault();
    //console.log('firstname = ' + firstname.val());
    //console.log('lastname = ' + lastname.val());
    //console.log('address = ' + address.val());
    //console.log('province = ' + $('#edit-province option:selected').text());
    //console.log('district = ' + $('#edit-district option:selected').text());
    //console.log('subDistrict = ' + subDistrict.val());
    
    provinceName = $('#edit-province option:selected').text();
    if (province.val() ==='') {
        provinceName = '';
    }
    
    districtName = $('#edit-district option:selected').text();
    if (district.val() === '') {
        districtName = '';
    }
    
    subDistrictName = subDistrict.find('option:selected').text();
    if (subDistrict.val() === '') {
        subDistrictName = '';
    }
    
    uploadImage = image.prop('files')[0];
    if (uploadImage) {
        //console.log(uploadImage);
    }
    formData = new FormData();
    formData.append('firstname', firstname.val());
    formData.append('lastname', lastname.val());
    formData.append('address', address.val());
    formData.append('province', provinceName);
    formData.append('district', districtName);
    formData.append('sub_district', subDistrictName);
    formData.append('email', email.val());
    formData.append('new_password', newPassword.val());
    formData.append('re_new_password', reNewPassword.val());
    formData.append('password', $('#password').val());
    if (uploadImage) {
        formData.append('member_image', uploadImage);
    }

    $.ajax({
        type: 'POST',
        url: webUrl + 'edit_my_account_pro',
        //headers: {'X-CSRFToken': csrftoken},
        processData: false,
        contentType: false,
        data: formData,
        success: function(data){
            if (data !== '1') {
                console.log(data);
                jsonData = JSON.parse(data);
                $('#errorMsg').html(jsonData.error);
                return;
            }
            
            location.reload();
        }
    });
}
