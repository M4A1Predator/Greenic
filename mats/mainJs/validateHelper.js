function validateDateFormat(dateString) {
    var re = /[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
    if(re.test(dateString) === false){
        return false;
    }
    return true;
}