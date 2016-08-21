function validateDateFormat(dateString) {
    var re = /[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
    if(re.test(dateString) === false){
        return false;
    }
    return true;
}

function validateRequiredValue(valueArray){
    for(i=0;i<valueArray.length;i++){
        value = valueArray[i].trim();
        if (value === "") {
            return false;
        }
    }
}