var emailWrongPatternError = 'กรุณากรอกอีเมล์ให้ถูกต้อง';
var emailHaveBeenUsedError = 'อีเมลล์ถูกใช้สมัครไปแล้ว';

var processingText = 'กำลังดำเนินการ';

var passwordEmptyError = 'กรุณาใส่รหัสผ่าน';
var signinFailed = 'อีเมลล์หรือรหัสผ่านไม่ถูกต้อง';

var monthThaiTextArray = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฏาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
//var projectTypeThaiText = ['ผัก', 'ผลไม้', 'สัตว์'];
var projectTypeThaiText = ['พืช/ผัก', 'ผลไม้', 'สัตว์'];

var projectTypeThaiDict = {
    //'vegetable' : 'ผัก','พืช/ผัก'
    'vegetable' : 'พืช/ผัก',
    'fruit' : 'ผลไม้',
    'animal' : 'สัตว์',
};

var activityTypeIdDict = {"add_project": 1, "update_timeline": 2};

var memberDefaultImagePath = 'files/defaults/member/user.jpg';
var projectDefaultImagePath = 'mats/assets/img/gBVZ3h.jpg';