var selectUnit = $('#select_unit');
var ppu = $('#ppu');
var quantity = $('#quantity');
var lowestOrder = $('#lowest_order');
var startDate = $('#startDate');
var sellDate = $('#sell_date');

var productUnitArr = $('.pUnit');

var addProject2Btn = $('#add_project2_btn');

setUnitOption();
selectUnit.change(changeUnit);
addProject2Btn.click(addProject2);

function getDateString(dateString) {
    var re = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
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

function setUnitOption(){
    selectUnit.empty();
    selectUnit.append('<option value="0" selected="" disabled="">เลือกหน่วย</option>');
    
    $.ajax({
        type : 'GET',
        url : webUrl + 'get_all_units_ajax',
    }).success(function (data){
        jsonData = JSON.parse(data);
        
        jsonData.forEach(function (unit){
            selectUnit.append('<option value="' + unit.unit_id + '" >' + unit.unit_name + '</option>');
        });
    });
}

function changeUnit() {
    if (selectUnit.val() === 0) {
        return;
    }
    unitName = $('#select_unit option:selected').text();
    
    productUnitArr.html(unitName);
}

function addProject2(e) {
    e.preventDefault();
    
    sellDateString = getDateString(sellDate.val());
    startDateString = getDateString(startDate.val());
    
    if(sellDateString === null){
        return;
    }
    
    param = {
        'unit_id' : selectUnit.val(),
        'ppu' : ppu.val(),
        'quantity' : quantity.val(),
        'lowest_order' : lowestOrder.val(),
        'start_date' : startDateString,
        'sell_date' : sellDateString
    };
    
    shipmentDict = {};
    
    $('.shipmentWay').each(function (index){
        nameArray = $(this).prop('name');
        shipmentId = nameArray[nameArray.length - 1] + "";
        shipmentDict[shipmentId] = $(this).prop('checked');
    });
    param.shipment = shipmentDict;
    //console.log(param);
    //return;

    $.ajax({
        type : 'POST',
        url : webUrl + 'member/add_project_step2_ajax',
        data : param
    }).success(function (data){
        if (data != "1") {
            console.log(data);
            return;
        }
        location.replace(webUrl + 'add_project/step3');
    });
    
}