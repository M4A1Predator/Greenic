
var firstname = $('#edit-firstname');
var lastname = $('#edit-lastname');
var address = $('#edit-address');
var province = $('#edit-province');
var district = $('#edit-district');
var subDistrict = $('#edit-sub-district');
var email = $('#edit-email');
var image = $('#edit-img');

var saveBtn = $('#save-btn');

saveBtn.click(saveDetail);

function saveDetail(e) {
    e.preventDefault();
    console.log('firstname = ' + firstname.val());
    console.log('lastname = ' + lastname.val());
    console.log('address = ' + address.val());
    console.log('province = ' + province.val());
    console.log('district = ' + district.val());
    console.log('subDistrict = ' + subDistrict.val());
    
    uploadImage = image.prop('files')[0];
    if (uploadImage) {
        console.log(uploadImage);
    }
    formData = new FormData();
    formData.append('firstname', firstname.val());
    formData.append('lastname', lastname.val());
    formData.append('address', address.val());
    formData.append('province', province.val());
    formData.append('district', district.val());
    formData.append('sub_district', subDistrict.val());
    formData.append('email', email.val());
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
            console.log(data);
        }
    });
}
