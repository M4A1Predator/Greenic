var projectId = $('#projectId');

var followProjectBtn = $('#followProjectBtn');
var unfollowProjectBtn = $('#unfollowProjectBtn');

followProjectBtn.click(function (e){
    e.preventDefault();
    follow('project', projectId.val());
    
});

unfollowProjectBtn.click(function (e){
    e.preventDefault();
    unfollow('project', projectId.val());
});

function follow(targetType, targetId){
    
    param = {
        'target_type' : targetType,
        'target_id' : targetId
    };
    
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


function unfollow(targetType, targetId){
    param = {
        'target_type' : targetType,
        'target_id' : targetId
    };
    
    $.ajax({
        type: 'POST',
        url : webUrl + 'unfollow_ajax',
        data : param
    }).success(function (data){
        if (data !== '1') {
            console.log(data);
            return;
        }
        
        location.reload();
    });
}
