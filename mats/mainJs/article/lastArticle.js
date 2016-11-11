$(document).ready(function (){
    var lastArticles = $('#lastArticles');
    
    setLastArticles();
    
    function setLastArticles(){
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'article/get_last_articles_ajax',
        }).done(function (data){
            jsonData = JSON.parse(data);
            
            articleArray = jsonData.result;
            
            articleArray.forEach(function (article){
                
                articleUrl = webUrl + 'article/' + article.article_id;
                
                introText = '';
                if (article.article_content.length > 0) {
                    sep = article.article_content.indexOf('</p>');
                    if (sep !== -1) {
                        if (sep < 150) {
                            introText = article.article_content.substring(0, (sep + ('</p>'.length)));
                        }else{
                            //introText = article.article_content.substring(0, (sep + 150));
                            introText = article.article_content.substring(0, (150)); // added
                        }
                    }else{
                        introText = article.article_content.substring(0, 150);
                    }
                    
                }
                
                articleCoverImage = webUrl + article.article_cover_image;
                if (article.article_cover_image == 'null' || !article.article_cover_image) {
                    articleCoverImage = webUrl + 'mats/assets/img/upload/article/002.jpg';
                    //console.log(articleCoverImage);
                    
                }
                //console.log(introText);
                
                content = '<div class="col-md-4 md-margin-bottom-40">';
                content += '<div class="news-v1-in bg-color-white">';
                        content += '<a href="' + articleUrl + '" class="linkFull"></a>';
                        content += '<img class="img-responsive" style="height: 228px; width: 360px;" src="' + articleCoverImage + '" alt="">';
                        content += '<h3 class="font-normal"><a href="#">' + article.article_headline + '</a></h3>';
                        content += '<p>' + introText + '</p>';
                        //content += introText;
                        content += '<ul class="list-inline news-v1-info no-margin-bottom">';
                            content += '<li><span>By</span> <a href="#">' + article.member_firstname + '</a></li>';
                            content += '<li>|</li>';
                            content += '<li><i class="fa fa-clock-o"></i> ' + getDateFromMySqlDateText(article.article_time) +  '</li>';
                            //content += '<li class="pull-right"><a href="#"><i class="fa fa-eye"></i> ' + article.article_view + '</a></li>';
                        content += '</ul>';
                    content += '</div>';
                content += '</div>';
                
                lastArticles.append(content);
                
            });
            
    });
    }
    
});