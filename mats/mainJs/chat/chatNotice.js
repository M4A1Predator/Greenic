$(document).ready(function (){
    
    checkUnreadConversation();
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
    
});