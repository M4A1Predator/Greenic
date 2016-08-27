
var fullName = $('#signup-fullname');
var email = $('#signup-email');
var password = $('#signup-password');
var acceptTerm = $('#accept-terms');
var signUpBtn = $('#signup-btn');

signUpBtn.click(regis);

var isValidEmail = null;

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(email) === false){
        return false;
    }
    return true;
}

function validatePassword(password) {
    rePassword = /[a-zA-Z0-9!@#$%&.,:*\-\]\[\/]/;
    return rePassword.test(password);
}

function is_unique_email(email){
    console.log('check email======');
    
    param = {
        'email' : email
    };
    
    $.ajax({
        type: "POST",
        url: webUrl + 'check_exist_email_pro',
        data: param
    }).success(function (data){
        jsonData = JSON.parse(data);
        //console.log(jsonData);
        if (jsonData.result === false) {
            $('#signup-email-error-msg').html(emailHaveBeenUsedError);
            $('#signup-email-error-msg').addClass("is-visible");
        }else{
            changeButtonProcessStatus();
            sendRegisData();
        }
    });
}

function regis() {
    //console.log('fullname = ' + fullName.val());
    //console.log('email = ' + email.val());
    //console.log('password = ' + password.val());
    //console.log(acceptTerm.prop('checked'));
    
    // Validate name
    if (fullName.val().length === 0) {
        $('#signup-fullname-error-msg').addClass("is-visible");
        return;
    }else{
        $('#signup-fullname-error-msg').removeClass("is-visible");
    }
    
    // Validate email
    if (!validateEmail(email.val())) {
        $('#signup-email-error-msg').html(emailWrongPatternError);
        $('#signup-email-error-msg').addClass("is-visible");
        return;
    }else{
        $('#signup-email-error-msg').removeClass("is-visible");
    }
    
    // Validate password
    if (!validatePassword(password.val()) || password.val().length < 8) {
        $('#signup-password-error-msg').addClass("is-visible");
        return;
    }else{
        $('#signup-password-error-msg').removeClass("is-visible");
    }
    
    if (acceptTerm.prop('checked') === false) {
        return;
    }
    
    is_unique_email(email.val());
    
}

function sendRegisData() {
    
    //console.log('sendRegisData');
    
    param = {
        'email' : email.val(),
        'fullname' : fullName.val(),
        'password' : password.val()
    };
    
    $.ajax({
        type: "POST",
        url: webUrl + 'regis_pro',
        data: param
    }).success(function (data){
        jsonData = JSON.parse(data);
        if (jsonData.result === false) {
            failedRegis();
            return;
        }
        
        location.replace(webUrl + 'please_confirm_email');
    });
}

function failedRegis() {
    
}

function changeButtonProcessStatus() {
    console.log('regis success');
    signUpBtn.prop('disabled', true);
    signUpBtn.val(processingText);
}


