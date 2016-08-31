var projectId = $('#projectId');

var followProjectBtn = $('#followProjectBtn');

followProjectBtn.click(function (e){
    e.preventDefault();
    
    follow('project', projectId.val());
    
});

function follow(targetType, targetId){
    
    param = {
        'target_type' : targetType,
        'target_id' : targetId
    };
    
    console.log(param);
    
    $.ajax({
        type: 'POST',
        url : webUrl + 'follow_ajax',
        data : param
    }).success(function (data){
        if (data !== '1') {
            console.log(data);
            return;
        }
        
        location.reload();
        
    });
    
}
