//function setMainProjectTypes(){
//    $.ajax({
//        type : 'GET',
//        url : webUrl  + 'get_project_types_with_count_ajax',
//    }).success(function (data){
//        jsonData = JSON.parse(data);
//        
//        $('#vegetableTypeText').html( projectTypeThaiDict[jsonData[0].project_type_name] + ' (' + jsonData[0].project_count + ')' );
//        $('#fruitTypeText').html( projectTypeThaiDict[jsonData[1].project_type_name] + ' (' + jsonData[1].project_count + ')' );
//        $('#animalTypeText').html( projectTypeThaiDict[jsonData[2].project_type_name] + ' (' + jsonData[2].project_count + ')' );
//    });
//}

$(document).ready(function (){
    var navCategoryVegetableList = $('#navCategoryVegetableList');
    var navCategoryFruitList = $('#navCategoryFruitList');
    var navCategoryAnimalList = $('#navCategoryAnimalList');
    var navTypeVegetableText = $('#navTypeVegetableText');
    var navTypeFruitText = $('#navTypeFruitText');
    var navTypeAnimalText = $('#navTypeAnimalText');
    
    setCategoryNav();

    function setCategoryNav(){
        limit = 10;
        
        param = {
            'project_type_id' : 0,
            'limit' : limit,
        };
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'category/get_top_categories_ajax',
            data : param
        }).success(function (data){
            //console.log(data);
            jsonData = JSON.parse(data);
            
            // Get data
            categoryArray = jsonData.result;
            categoryCount = parseInt(jsonData.count);
            
            // Init amount variables
            vegCount = 0;
            fruitCount = 0;
            animalCount = 0;
            
            categoryArray.forEach(function (category){
                catList = null;
                if (parseInt(category.category_project_type_id) === 1) {
                    catList = navCategoryVegetableList;
                    vegCount += 1;
                }else if (parseInt(category.category_project_type_id) === 2) {
                    catList = navCategoryFruitList;
                    fruitCount += 1;
                }else if ( parseInt(category.category_project_type_id) === 3) {
                    catList = navCategoryAnimalList;
                    animalCount += 1;
                }
                catUrl = webUrl + 'category/' + category.project_type_name + '/' + category.category_id;
                catList.append('<li><a href="' + catUrl + '">' + category.category_name + ' (' + category.project_count + ')</a></li>');
            });
            
            // Set text
            navTypeVegetableText.html('ผักอินทรีย์ (' + vegCount + ')' );
            navTypeFruitText.html('ผลไม้อินทรีย์ (' + fruitCount + ')' );
            navTypeAnimalText.html('สัตว์อินทรีย์ (' + animalCount + ')' );
            
        });
    }

});