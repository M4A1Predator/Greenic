function getDateFromMySqlDateText(mySqlDate) {
    dateArray = mySqlDate.split(/[- :]/);
    
    date = new Date();
    
    year =  parseInt(dateArray[0]);
    month = parseInt(dateArray[1]) - 1;
    day = parseInt(dateArray[2]);
    
    date.setFullYear(year);
    date.setMonth(month);
    date.setDate(day);
    
    dateText = date.getDate() + '/' + (date.getMonth() +1 ) + '/' + (date.getFullYear() + 543);
    return dateText;
}

function getDateTimeTextFromMySqlDateText(mySqlDate) {
    dateArray = mySqlDate.split(/[- :]/);
    
    date = new Date();
    
    year =  parseInt(dateArray[0]);
    month = parseInt(dateArray[1]) - 1;
    day = parseInt(dateArray[2]);
    hour = parseInt(dateArray[3]);
    minute = parseInt(dateArray[4]);
    
    date.setFullYear(year);
    date.setMonth(month);
    date.setDate(day);
    
    dateText = date.getDate() + '/' + (date.getMonth() +1 ) + '/' + (date.getFullYear() + 543) + ' ' + hour + ':' + minute;
    return dateText;
}

function getMonthThaiText(mySqlDate) {
    
    dateArray = mySqlDate.split(/[- :]/);
    
    date = new Date();
    
    year =  parseInt(dateArray[0]);
    month = parseInt(dateArray[1]) - 1;
    day = parseInt(dateArray[2]);
    
    date.setFullYear(year);
    date.setMonth(month);
    date.setDate(day);
    
    return monthThaiTextArray[month];
}

function getMySqlDateString(dateString) {
    
    var re = /^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/;
    if(re.test(dateString) === false){
        return false;
    }
    
    dateArray = dateString.split('/');
    
    for (i=0; i<dateArray.length; i++) {
        if (isNaN(dateArray[i])) {
            return false;
        }
    }
    
    date = new Date();
    date.setDate(dateArray[0]);
    date.setMonth(parseInt(dateArray[1]) - 1);
    date.setFullYear( parseInt(dateArray[2]) - 543);
    
    dateStringMySQL = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
    
    return dateStringMySQL;
}

function getElementIdFromId(idText) {
    idTextArray = idText.split('-');
    return idTextArray[1];
}