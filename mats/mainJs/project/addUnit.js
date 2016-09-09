$(document).ready(function (){
    var addUnitName = $('#addUnitName');
    var addUnitBtn = $('#addUnitBtn');
    
    addUnitBtn.click(addUnit);
    addUnitBtn.keypress();
    
    function addUnit() {
        addUnitNameText = addUnitName.val().trim();
        if (addUnitNameText === '') {
            return;
        }
        
        param = {
            'unit_name' : addUnitNameText
        };
        
        
        $.ajax({
            type : 'POST',
            url : webUrl + 'member_add/unit_ajax',
            data : param
        }).done(function (data){
            if (data !== '1') {
                console.log(data);
                return;
            }
            
            setUnitOption();
            $('#addUnit').modal('toggle');
            
        });
        
    }
    
});
