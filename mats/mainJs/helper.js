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