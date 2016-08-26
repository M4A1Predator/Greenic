var projectId = $('#projectId');
var shipmentWay = $('#shipmentWay');

var postOffset = 0;
var postLimit = 5;
var timelineList = $('#timelineList');
var getOlderBtn = $('#getOlderBtn');

var projectPictures = $('#projectPictures');

setShipment();
setTimeline();

getOlderBtn.click(setTimeline);

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

function setTimeline(){
    
    param = {
        'project_id' : projectId.val(),
        'post_limit' : postLimit,
        'post_offset' : postOffset,
    };
    
    $.ajax({
        type : 'POST',
        url : webUrl + 'get_project_posts_ajax',
        data : param
    }).success(function (data){
        if (data == "0") {
            console.log('timeline error');
            return;
        }
        
        jsonData = JSON.parse(data);
        
        jsonData.forEach(function (projectPost){

            content = '<li>' + 
                        '<time class="cbp_tmtime" datetime=""><span>' + getDateFromMySqlDateText(projectPost.project_post_time) + '</span> <span>' + getMonthThaiText(projectPost.project_post_time) + '</span></time>' + 
                        '<i class="cbp_tmicon rounded-x hidden-xs"></i>' + 
                        '<div class="cbp_tmlabel">' + 
                            '<h2>' + projectPost.project_post_caption + '</h2>' + 
                            '<div class="row">' +
                                '<div class="col-md-12">' +
                                    '<img class="img-responsive" src="' + webUrl + projectPost.project_post_image + '" alt="">' + 
                                    '<div class="margin-bottom-20"></div>' +
                                '</div>' +
                                '<div class="col-md-12">' +
                                    '<p>' + projectPost.project_post_detail + '</p>' + 
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</li>';
            
            timelineList.append(content);
        });
        if (jsonData.length > 0) {
            postOffset += postLimit;
        }
        
    });
}

function setProjectPictures(){
    
}