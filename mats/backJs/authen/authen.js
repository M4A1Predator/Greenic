$(document).ready(function (){
    var username = $('#username');
    var password= $('#password');
    var signInBtn = $('#signInBtn');
    
    signInBtn.click(authen);
    
    function authen() {
        param = {
            'username' : username.val(),
            'password' : password.val()
        };
        
        $.ajax({
            type : 'POST',
            url : webUrl + 'gnc_admin/_sign_in_pro_ajax',
            data : param
        }).done(function (data){
            if (data !== '1') {
                console.log(data);
                return;
            }
            //console.log(data);
            location.replace(adminWebUrl);
            
        });
        
    }
    
});