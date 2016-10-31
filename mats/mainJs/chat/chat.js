$(document).ready(function (){
    
    //$("#chatBox").animate({ scrollTop: $("#chatBox")[0].scrollHeight}, 1000);
    
    
    var sendMessageBtn = $('#sendMessageBtn');
    var memberId = $('#memberId');
    var receiverId = $('#receiverId');
    var sendingMessage = $('#sendingMessage');
    var chatMessageList = $('#chatMessageList');
    
    // INIT
    var memberImagePath = webUrl + $('#memberImg').val();
    var memberName = $('#memberName').val();
    var receiverImagePath = webUrl + $('#receiverImg').val();
    var receiverName = $('#receiverName').val();
    showOldMessageList();
    
    // SOCKET!
    var socket = io('http://127.0.0.1:3001');
    
    // Bind events
    socket.on('response_message', function(data){
        console.log(data);
    });
    
    
    // Set Callbacks
    sendMessageBtn.click(sendMessage);
    
    // Set functions
    function sendMessage(){
        
        messageText = sendingMessage.val().trim();
        
        param = {
            sender : memberId.val(),
            receiver : receiverId.val(),
            message : messageText
        };
        
        console.log(param);
        sendingMessage.val('');
        
        $.ajax({
            type : 'post',
            url : webUrl + 'chat/send_message_ajax',
            data : param,
        }).done(function (data){
            console.log(data);
            
            content = '<li class="right clearfix"><span class="chat-img pull-right">';
                content += '<img src=" ' + memberImagePath + '" alt="User Avatar" class="img-circle chatProfile" />';
             content += '</span>';
                 content += '<div class="chat-body clearfix">';
                     content += '<div class="header">';
                         content += '<strong class="primary-font">' + memberName + '</strong> <small class="pull-right text-muted">';
                             content += '<span class="glyphicon glyphicon-time"></span>';
                             content += '</small>';
                     content += '</div>';
                     content += '<p>';
                         content += messageText;
                     content += '</p>';
                 content += '</div>';
             content += '</li>';
             
            chatMessageList.append(content);
        });
    }
    
    function showOldMessageList(){
        
        param = {
            receiver_id : receiverId.val(),
        };
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'chat/get_conversation_message_list_ajax',
            data : param,
        }).done(function (data){
            console.log(data);
            jsonData = JSON.parse(data);
            messageList = jsonData.messageList;
            
            messageList.forEach(function (oldMessage){
                
                //if (oldMessage.chat_sender_id === memberId.val()) {
                //    imagePositionClass = 'pull-right';
                //}else{
                //    imagePositionClass = 'pull-left';
                //}
                //
                //content = '<li class="left clearfix"><span class="chat-img ' + imagePositionClass + '">';
                //           content += '<img src="<?=base_url()?>mats/assets/img/testimonials/img7.jpg" alt="User Avatar" class="img-circle chatProfile" />';
                //        content += '</span>';
                //            content += '<div class="chat-body clearfix">';
                //                content += '<div class="header">';
                //                    content += '<strong class="primary-font">สมหมาย ร่ำรวย</strong> <small class="' + imagePositionClass + ' text-muted">';
                //                        content += '<span class="glyphicon glyphicon-time"></span>18 นาทีที่แล้ว</small>';
                //                content += '</div>';
                //                content += '<p>';
                //                    content += oldMessage.chat_message;
                //                content += '</p>';
                //            content += '</div>';
                //        content += '</li>';
                
                memberImagePath = webUrl + $('#memberImg').val();
                memberName = $('#memberName').val();
                receiverImagePath = webUrl + $('#receiverImg').val();
                receiverName = $('#receiverName').val();
                
                sendTimeText = getDateTimeTextFromMySqlDateText(oldMessage.chat_sendtime);
                
                if (oldMessage.chat_sender_id === memberId.val()) {     
                    content = '<li class="right clearfix"><span class="chat-img pull-right">';
                           content += '<img src=" ' + memberImagePath + '" alt="User Avatar" class="img-circle chatProfile" />';
                        content += '</span>';
                            content += '<div class="chat-body clearfix">';
                                content += '<div class="header">';
                                    content += '<strong class="primary-font">' + memberName + '</strong> <small class="pull-right text-muted">';
                                        content += '<span class="glyphicon glyphicon-time"></span>' + sendTimeText;
                                        content += '</small>';
                                content += '</div>';
                                content += '<p>';
                                    content += oldMessage.chat_message;
                                content += '</p>';
                            content += '</div>';
                        content += '</li>';
                }else{
                    content = '<li class="left clearfix"><span class="chat-img pull-right">';
                           content += '<img src="' + receiverImagePath + '" alt="User Avatar" class="img-circle chatProfile" />';
                        content += '</span>';
                            content += '<div class="chat-body clearfix">';
                                content += '<div class="header">';
                                    content += '<strong class="primary-font">' + receiverName + '</strong> <small class="pull-right text-muted">';
                                        content += '<span class="glyphicon glyphicon-time"></span>' + sendTimeText;
                                        content += '</small>';
                                content += '</div>';
                                content += '<p>';
                                    content += oldMessage.chat_message;
                                content += '</p>';
                            content += '</div>';
                    content += '</li>';
                }
                        
                chatMessageList.append(content);
            });
            $("#chatBox").scrollTop($("#chatBox").prop("scrollHeight"));
        });
    }
    
});