$(document).ready(function (){
    
    var notificationRows = $('#notificationRows');
    var unreadNotificationAmount = $('#unreadNotificationAmount');
    var noticeMenu = $('#noticeMenu');
    var currentNotificationRows;
    
    // Init
    // Set notification rows
    setNotifications();
    
    // Assign signals
    noticeMenu.click(noticeAllNotifications);
    
    function setNotifications(){
        $.ajax({
            type : 'GET',
            url : webUrl + 'member/get_notifications_ajax'
        }).success(function (data){
            if (data == '0') {
                return;
            }
            //console.log(data);
            jsonData = JSON.parse(data);
            
            // Add notices to nav
            unreadNoticeAmount = 0;
            
            jsonData.forEach(function (notification){
                
                // Activity URL
                updateUrl = webUrl + 'project/' + notification.project_id;
                
                // Set notice message
                if(notification.activity_type_name == 'update_timeline'){
                    noticeMessage = notification.project_post_caption;
                }
                
                member_img = webUrl + notification.member_img_path;
                if (notification.member_img_path == 'null') {
                    member_img = webUrl + memberDefaultImagePath;
                }
                
                content = '<div class="col-md-12 margin-bottom-10">';
                content += '<div class="testimonials-info rounded-bottom bg-color-light">';
                //content += '<img class="rounded-x" src="' + webUrl + 'mats/assets/img/testimonials/img5.jpg" alt="">';
                content += '<img class="rounded-x" src="' + member_img +  '" alt="">';
                content += '<div class="testimonials-desc">';
                content += '<p>ฟาร์ม: ' + notification.farm_name + ' <strong><i class="fa fa-bell" aria-hidden="true"></i> ' + notification.activity_text + ' ' + notification.project_name + '</strong></p>';
                if (noticeMessage) {
                    content += '<p>"' + noticeMessage + '"</p>';
                }
                content += '<strong>เกษตรกร: ' + notification.member_firstname + ' ' + notification.member_lastname + '</strong>';
                content += '<p>' + getDateTimeTextFromMySqlDateText(notification.notification_time) + ' </p>';
                content += '<a class="btn-u btn-u-xs btn-u" href="' + updateUrl + '" type="button">ดูการอัพเดท</a>';
                content += '</div>';
                content += '</div>';
                
                // Check unread notice
                if (notification.notification_notice === '0') {
                    unreadNoticeAmount += 1;
                }
                
                // Append notice div to list
                notificationRows.append(content);
                
            });
            
            currentNotificationRows = jsonData;
            
            // If has unread notice then display unread amount
            if (unreadNoticeAmount > 0) {
                unreadNotificationAmount.html( '(' + unreadNoticeAmount + ')');
            }else{
                noticeMenu.removeClass('notic');
            }
            
        });
    }
    
    function noticeAllNotifications(){
        
        // Send PUT request to acknowledge notifications
        $.ajax({
            type: 'PUT',
            url : webUrl + 'member/notice_all_notifications_ajax',
        }).success(function (data){
            console.log(data);
            noticeMenu.removeClass('notic');
            unreadNotificationAmount.html('');
        });
        
    }

    

});