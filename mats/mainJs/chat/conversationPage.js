$(document).ready(function (){
    
    var conversationRow = $('#conversationRow');
    var conversationRow2 = $('#conversationRow2');
    var memberId = $('#memberId');
    
    getConversationList();
    
    function getConversationList(){
        
        $.ajax({
            type: 'get',
            url : webUrl + 'member/get_conversations_ajax',
        }).done(function (data){
            jsonData = JSON.parse(data);
            console.log(jsonData);
            
            conversationArray = jsonData.conversationData.conversation_arr;
            
            conversationArray.forEach(function (conversation, index){
                console.log(conversation);
                //memberDefaultImagePath
                if (conversation.member_id_a === memberId.val()) {
                    lst = '_b';
                    
                }else{
                    lst = '_a';
                }
                img_path = conversation['member_img_path' + lst];
                if (!img_path) {
                    img_path = memberDefaultImagePath;
                }
                chatUrl = webUrl + 'chat/' + conversation['member_id'+lst];
                personName = conversation['member_firstname' + lst];
                if (conversation['member_lastname' + lst]){
                    personName += ' ' + conversation['member_lastname' + lst];
                }
                
                content = '<tr>';
                content += ' <td class="chatProfile"><img class="rounded-x" src="' + webUrl + img_path + '" alt=""></td>';
                content += ' <td><a href="' + chatUrl + '">' + personName + '</a><br><small class="chatName"></td>';
                //content += '<i class="fa fa-map-marker" aria-hidden="true"></i> ฟาร์มบ้านไร่ชายตวัน</small>';
                content += ' <td><button class="btn btn-default btn-xs"><i class="fa fa-clock-o"></i> ' + getDateTimeTextFromMySqlDateText(conversation.conversation_time) + '</button></td>';
                content += '</tr>';
                
                if ( (index + 1) % 2 !== 0 ) {
                    conversationRow.append(content);
                }else{
                    conversationRow2.append(content);
                }
                
            });
            
            
        });
        
    }
    
    
});