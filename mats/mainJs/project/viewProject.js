var projectId = $('#projectId');
var shipmentWay = $('#shipmentWay');

setShipment();

function setShipment() {
    $.ajax({
        type : 'GET',
        url : webUrl + 'get_project_shipments_ajax/'+projectId.val(),
    }).success(function (data){
        jsonData = JSON.parse(data);
        
        shipmentTextArray = [];
        shipmentText = "";
        
        jsonData.forEach(function (shipment){
            shipmentTextArray.push(shipment.shipment_name);
        });
        
        if (shipmentTextArray.length === 0) {
            shipmentText = noShipmentWayText;
        }else{
            shipmentText = shipmentTextArray.join(', ');
        }
        
        shipmentWay.html(shipmentText);
        
    });
}