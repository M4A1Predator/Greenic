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

function addProject2() {
    
    param = {
        'unit_id' : selectUnit.val(),
        'ppu' : ppu.val(),
        'qunatity' : quantity.val(),
        'lowest_order' : lowestOrder.val(),
        'sell_date' : sellDate.val()
    };
    
    console.log($('.shipmentWay option:[index=1]');
    
}