var selectUnit = $('#select_unit');
var ppu = $('#ppu');
var quantity = $('#quantity');
var lowestOrder = $('#lowest_order');
var sellDate = $('#sell_date');

var productUnitArr = $('.pUnit');

var addProject2Btn = $('#add_project2_btn');

setUnitOption();
selectUnit.change(changeUnit);
addProject2Btn.click(addProject2);

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
    
    param = {
        'unit_id' : selectUnit.val(),
        'ppu' : ppu.val(),
        'quantity' : quantity.val(),
        'lowest_order' : lowestOrder.val(),
        'sell_date' : sellDate.val()
    };
    
    shipmentDict = {};
    
    $('.shipmentWay').each(function (index){
        //console.log(index);
        //param[$(this).prop('name')] = $(this).prop('checked');
        shipmentDict[index] = $(this).prop('checked');
    });
    param.shipment = shipmentDict;
    //console.log(param);
    
    $.ajax({
        type : 'POST',
        url : webUrl + 'member/add_project_step2_ajax',
        data : param
    }).success(function (data){
        if (data != "1") {
            return;
        }
        
        location.replace(webUrl + 'add_project/step3');
        
    });
    
}