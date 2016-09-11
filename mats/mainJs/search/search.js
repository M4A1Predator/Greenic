$(document).ready(function() {
    var searchKeyword = $('#searchKeyword');
    var searchBtn = $('#searchBtn');
    var selectSortProjectBy = $('#selectSortProjectBy');
    
    searchBtn.click(searchProject);
    searchKeyword.keypress(function (e){
        if(e.which  == 13){
            searchProject();
        }
    });
    
    function searchProject() {
        location.replace(webUrl + 'search?keyword=' + searchKeyword.val());
        
    }
    
});