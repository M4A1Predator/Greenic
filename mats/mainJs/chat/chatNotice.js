$(document).ready(function (){
    
    checkUnreadConversation();
    checkChatRealtime();
    
    function checkUnreadConversation() {
        
        $.ajax({
            type :'get',
            url : webUrl + 'chat/get_unread_conversation_ajax',
        }).done(function (data){
            jsonData = JSON.parse(data);
            
            unreadConversationArray = jsonData.unread_conversation_arr;
            unreadCount = unreadConversationArray.length;
            
            unreadCountText = '';
            
            if (unreadCount > 0) {
                unreadCountText = '(' + unreadCount + ')';
                if (unreadCount > 9) {
                    unreadCountText = '(9+)';
                }
            }
            
            unreadIdArrayText = '';
            unreadConversationArray.forEach(function (conversation){
                unreadIdArrayText += conversation.conversation_id + '-';
            });
            
            $('#unreadConversationAmount').html(unreadCountText);
            
        });
        
    }
    
    
    function checkChatRealtime() {
        
        fullUrl = window.location.href;
        
        //console.log(fullUrl.indexOf(webUrl + 'chat/'));
        
        if (fullUrl.indexOf(webUrl + 'chat/') !== 0) {
            var socket = io('https://greenic.co:2053', {secure: true});
            
            // Bind events
            socket.on('response_message', function(data){
                
                if (data.chat_member_id !== $('#onlineMemberId').val() ) {
                    checkUnreadConversation();
                }
            });
            
        }else{
            
        }
        
    }
    
});