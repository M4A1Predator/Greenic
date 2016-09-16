function compareInit(){
    var compareBtn = $('#compareBtn');
    var compareProject = $('input[id^="compareProject"]');
    var compareIdArray = [];
    var maxCompare = 3;
    
    var compareProjectDataRow = $('#compareProjectDataRow');
    var compareProjectPpuRow = $('#compareProjectPpuRow');
    var compareProjectSellDateRow = $('#compareProjectSellDateRow');
    var compareProjectStarRow = $('#compareProjectStarRow');
    
    // Set callback
    compareBtn.click(compareProjects);
    
    compareProject.change(function (){
        pId = getElementIdFromId($(this).prop('id'));
        if ($(this).prop('checked')) {
            if (compareIdArray.length < maxCompare) {
                compareIdArray.push(pId);
            }else{
                compareIdArray.push(pId);
                compareIdArray.splice(0, 1);
            }
        }else{
            removeIdIndex = compareIdArray.indexOf(pId);
            if (removeIdIndex != -1) {
                compareIdArray.splice(removeIdIndex, 1);
            }
        }
        
    });
    
    function compareProjects(){
        
        // Clear data
        compareProjectDataRow.empty();
        compareProjectPpuRow.empty();
        compareProjectSellDateRow.empty();
        compareProjectStarRow.empty();
        
        projectIdsText = compareIdArray.join('-');
        
        param = {
            "project_ids" : projectIdsText
        };
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'vote/get_compare_review_data_ajax',
            data : param
        }).done(function (data){
            jsonData = JSON.parse(data);
            reviewRateArray = jsonData.project_review_rate_arr;
            
            compareIdArray.forEach(function (cId){
                reviewRateArr = $.grep(reviewRateArray, function (e){return e.project_id == cId;});
                reviewRate = reviewRateArr[0];
                
                starList = '';
                thisRate = parseInt(reviewRate.review_rate);                
                for (i=1;i<=5;i++) {
                    if (i <= thisRate) {
                        starList += '<i class="fa fa-star" aria-hidden="true"></i> ';
                    }else{
                        starList += '<i class="fa fa-star-o" aria-hidden="true"></i> ';
                    }
                }
                content = '<td>';
                content += starList;
                content += '</td>';
                
                compareProjectStarRow.append(content);
                
            });
            
        });
        
        compareIdArray.forEach(function (cId){
            // get project data by ID
            projectArr = $.grep(projectArray, function(e){return e.project_id == cId;});
            project = projectArr[0];
            
            // Add data
            content = '<th>' +
                '<div class="easy-block-v2">' + 
                    '<a href="' + webUrl + 'project/' + project.project_id + '" class="linkFull"></a>' + 
                    //'<div class="easy-bg-v2 rgba-default">มาใหม่</div>' +
                    '<img width="272"  alt="" src="' + webUrl + project.project_cover_image_path + '">' +
                    '<h3>' + project.project_name + '</h3>' +
                    '<ul class="list-unstyled">' +
                        '<li><span class="color-green"><i class="fa fa-map-marker" aria-hidden="true"></i></span>' + project.farm_district + ', ' + project.farm_province + '</li>' +
                    '</ul>' +
                '</div>' +
            '</th>';
            compareProjectDataRow.append(content);
            
            // Add ppu
            content = '<td>' + project.project_ppu + '  บาท/' + project.unit_name + '</td>';
            compareProjectPpuRow.append(content);
            
            // Add sell date
            content = '<td><span class="color-green">พร้อมจำหน่าย:</span> ' + getDateFromMySqlDateText(project.project_selldate) + '</td>';
            compareProjectSellDateRow.append(content);
        });
        
        
        
    }
}

