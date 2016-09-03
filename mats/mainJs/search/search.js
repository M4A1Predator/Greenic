$(document).ready(function() {
    var searchKeyword = $('#searchKeyword');
    var searchBtn = $('#searchBtn');
    
    searchBtn.click(searchProject);
    
    function searchProject() {
        location.replace(webUrl + 'search?keyword=' + searchKeyword.val());
    }
    
});