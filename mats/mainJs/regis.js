
var fullName = $('#signup-fullname');
var email = $('#signup-email');
var password = $('#signup-password');
var acceptTerm = $('#accept-terms');
var signUpBtn = $('#signup-btn');

signUpBtn.click(regis);

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function regis() {
    console.log('fullname = ' + fullName.val());
    if (fullName.val().length === 0) {
        console.log('no name');
        $('#signup-fullname-error-msg').addClass("is-visible");
        return;
    }

    if (!validateEmail(email.val())) {
        $('#signup-email-error-msg').addClass("is-visible");
        return;
    }
    
    console.log(acceptTerm.prop('checked'));
}


