$(document).ready(function (){
    
    var notificationRows = $('#notificationRows');
    
    setNotifications();
    
    function setNotifications(){
        $.ajax({
            type : 'GET',
            url : webUrl + 'member/get_notifications_ajax'
        }).success(function (data){
            if (data == '0') {
                return;
            }
            
            jsonData = JSON.parse(data);
            jsonData.forEach(function (notification){
                content = '<div class="col-md-12 margin-bottom-10">' + 
                '<div class="testimonials-info rounded-bottom bg-color-light">' + 
                    '<img class="rounded-x" src="' + webUrl + 'mats/assets/img/testimonials/img5.jpg" alt="">' + 
                    '<div class="testimonials-desc">' + 
                        '<p>ฟาร์ม: ' + notification.farm_name + ' <strong><i class="fa fa-bell" aria-hidden="true"></i> เพิ่มสินค้าใหม่</strong></p>' + 
                        '<strong>เกษตรกร: ' + notification.member_firstname + ' ' + notification.member_lastname + '</strong>' + 
                        '<a class="btn-u btn-u-xs btn-u" type="button">ดูการอัพเดท</a>' + 
                    '</div>' + 
                '</div>';
                
                notificationRows.append(content);
                
            });
            
        });
    }
});