
var signInEmail = $('#signin-email');
var signInPassword = $('#signin-password');
var rememberMe = $('#remember-me');
var signInBtn = $('#signin-btn');

signInBtn.click(signIn);

signInEmail.keypress(function (e){
    if (e.keyCode == 13) {
        signIn();
    }
});

signInPassword.keypress(function (e){
    if (e.keyCode == 13) {
        signIn();
    }
});


function signIn(){
    
    if (validateEmail(signInEmail.val()) === false) {
        $('#signin-email-error-msg').html(emailWrongPatternError);
        $('#signin-email-error-msg').addClass("is-visible");
        return;
    }else{
        $('#signin-email-error-msg').removeClass("is-visible");
    }
    
    //pwd = signInPassword.val().trim();
    pwd = signInPassword.val();
    if (pwd.length === 0) {
        $('#signin-password-error-msg').html(passwordEmptyError);
        $('#signin-password-error-msg').addClass("is-visible");
    }else{
        $('#signin-password-error-msg').removeClass("is-visible");
    }
    
    console.log('email = ' + signInEmail.val());
    console.log('password = ' + signInPassword.val());
    console.log('rememberMe = ' + rememberMe.prop('checked'));
    
    sendAuthen();
}

function sendAuthen(){
    
    param = {
        'email' : signInEmail.val(),
        'password' : signInPassword.val(),
        'remember_sign_in' : rememberMe.prop('checked')
    };
    
    $.ajax({
        type: "POST",
        url: webUrl + 'sign_in',
        data: param
    }).success(function (data){
        if (data === "0") {
            $('#signin-error-msg').html(signinFailed);
            $('#signin-error-msg').prop('visibility', 'visible');
            return;
        }
        $('#signin-error-msg').prop('visibility', 'hidden');
        
        location.reload();
    });
}


