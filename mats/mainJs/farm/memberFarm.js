$(document).ready(function (){
    
    var removeFarmBtn = $('button[id^="removeFarmBtn"]');
    var confirmRemoveFarmBtn = $('#confirmRemoveFarmBtn');
    
    var removeFarmId = 0;
    
    confirmRemoveFarmBtn.click(removeFarm);
    
    removeFarmBtn.click(function (){
        idText = $(this).prop('id');
        idTextArray = idText.split('-');
        farmId = idTextArray[idTextArray.length-1];
        farmName = $('#farmName-'+farmId).html();
        
        $('#removeFarmName').html(farmName);
        
        removeFarmId = farmId;
        
    });
    
    function removeFarm() {
        param = {
            'farm_id' : removeFarmId
        };
        
        //console.log(param);
        //return;
        
        $.ajax({
            type : 'POST',
            url : webUrl + 'member_remove/farm_ajax',
            data : param
        }).done(function (data){
            if (data !== '1') {
                console.log(data);
                return;
            }
            
            location.reload();
        });
    }
    
});