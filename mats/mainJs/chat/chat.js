$(document).ready(function (){
    
    //$("#chatBox").animate({ scrollTop: $("#chatBox")[0].scrollHeight}, 1000);    
    
    var sendMessageBtn = $('#sendMessageBtn');
    var memberId = $('#memberId');
    var receiverId = $('#receiverId');
    var sendingMessage = $('#sendingMessage');
    var chatMessageList = $('#chatMessageList');
    var conversationId = $('#conversationId');
    
    // INIT
    var memberImagePath = webUrl + $('#memberImg').val();
    var memberName = $('#memberName').val();
    var receiverImagePath = webUrl + $('#receiverImg').val();
    var receiverName = $('#receiverName').val();
    
    showOldMessageList();
    
    // SOCKET!
    var socket = io('https://greenic.co:2053', {secure: true});
    
    // Bind events
    socket.on('response_message', function(data){
        console.log(data);
        if (data.chat_conversation_id === $('#conversationId').val() && data.chat_member_id !== memberId.val() ) {
            getMessage(data);
            
            param = {
                conversation_id : conversationId.val(),
            };
            $.ajax({
                type : 'post',
                url : webUrl + 'chat/update_seen_message',
                data : param,
            }).done(function (data){
            
            });
        }
    });
    
    
    // Set Callbacks
    sendMessageBtn.click(sendMessage);
    sendingMessage.keydown(function (e) {
        if (e.keyCode == 13) {
            sendMessage();
        }
    });
    
    // Set functions
    function sendMessage(){
        
        messageText = sendingMessage.val().trim();
        
        param = {
            sender : memberId.val(),
            receiver : receiverId.val(),
            conversation_id : conversationId.val(),
            message : messageText
        };
        
        console.log(param);
        sendingMessage.val('');
        
        $.ajax({
            type : 'post',
            url : webUrl + 'chat/send_message_ajax',
            data : param,
        }).done(function (data){
            
            content = '<li class="right clearfix"><span class="chat-img pull-right">';
                content += '<img src=" ' + memberImagePath + '" alt="User Avatar" class="img-circle chatProfile" />';
             content += '</span>';
                 content += '<div class="chat-body clearfix">';
                     content += '<div class="header">';
                         content += '<small class="text-muted">';
                            content += '<span class="glyphicon glyphicon-time"></span>' + getDateTimeText();
                            content += '</small>';
                            content += '<strong class="pull-right primary-font">' + memberName + '</strong>';
                     content += '</div>';
                     content += '<p>';
                         content += messageText;
                     content += '</p>';
                 content += '</div>';
             content += '</li>';
             
            chatMessageList.append(content);
            $("#chatBox").scrollTop($("#chatBox").prop("scrollHeight"));
        });
    }
    
    function showOldMessageList(){
        
        param = {
            receiver_id : receiverId.val(),
            conversation_id : $('#conversationId').val(),
        };
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'chat/get_conversation_message_list_ajax',
            data : param,
        }).done(function (data){
            //console.log(data);
            jsonData = JSON.parse(data);
            messageList = jsonData.messageList;
            
            messageList.forEach(function (oldMessage){
                
                sendTimeText = getDateTimeTextFromMySqlDateText(oldMessage.chat_sendtime);
                
                if (oldMessage.chat_member_id === memberId.val()) {
                    content = '<li class="right clearfix"><span class="chat-img pull-right">';
                           content += '<img src=" ' + memberImagePath + '" alt="User Avatar" class="img-circle chatProfile" />';
                        content += '</span>';
                            content += '<div class="chat-body clearfix">';
                                content += '<div class="header">';
                                    content += '<small class="text-muted">';
                                        content += '<span class="glyphicon glyphicon-time"></span>' + sendTimeText;
                                        content += '</small>';
                                        content += '<strong class="pull-right primary-font">' + memberName + '</strong>';
                                content += '</div>';
                                content += '<p>';
                                    content += oldMessage.chat_message;
                                content += '</p>';
                            content += '</div>';
                        content += '</li>';
                }else{
                    content = '<li class="left clearfix"><span class="chat-img pull-left">';
                            content += '<img src="' + receiverImagePath + '" alt="User Avatar" class="img-circle chatProfile" />';
                        content += '</span>';
                            content += '<div class="chat-body clearfix">';
                                content += '<div class="header">';
                                    content += '<strong class="primary-font">' + receiverName + '</strong> <small class="pull-right text-muted">';
                                        content += '<span class="glyphicon glyphicon-time"></span>' + sendTimeText + '</small>';
                                content += '</div>';
                                content += '<p>';
                                    content += oldMessage.chat_message;
                                content += '</p>';
                            content += '</div>';
                        content += '</li>';
                }
                        
                chatMessageList.append(content);
                
            });
            
            param = {
                conversation_id : conversationId.val(),
            };
            $.ajax({
                type : 'post',
                url : webUrl + 'chat/update_seen_message',
                data : param,
            }).done(function (data){
            
            });
            autoScroll();
        });
    }
    
    function getMessage(data){
        content = '<li class="left clearfix"><span class="chat-img pull-left">';
        content += '<img src="' + receiverImagePath + '" alt="User Avatar" class="img-circle chatProfile" />';
        content += '</span>';
            content += '<div class="chat-body clearfix">';
                content += '<div class="header">';
                    content += '<strong class="primary-font">' + receiverName + '</strong> <small class="pull-right text-muted">';
                        content += '<span class="glyphicon glyphicon-time"></span>' + getDateTimeText() + '</small>';
                content += '</div>';
                content += '<p>';
                    content += data.chat_message;
                content += '</p>';
            content += '</div>';
        content += '</li>';
        
        chatMessageList.append(content);
        autoScroll();
    }
    
    function autoScroll(){
        $("#chatBox").scrollTop($("#chatBox").prop("scrollHeight"));
    }
    
});