$(document).ready(function (){
    
    var articleList = $('#articleList');
    var page = $('#page');
    var pageList = $('#pageList');
    
    getAllArticles();
    
    
    function getAllArticles(){
        
        pageList.empty();
        articleList.empty();
        
        limit = 16;
        pageVal = page.val();
        if (!pageVal) {
            pageVal = 1;
        }
        param = {
            'limit' : limit,
            'page' : pageVal,
        };
        
        $.ajax({
            type: 'get',
            url : webUrl + 'article/get_all_articles_ajax',
            data : param
        }).done(function (data){
            jsonData = JSON.parse(data);
            
            articleArray = jsonData.article_arr;
            articleCount = jsonData.article_count;
            
            articleArray.forEach(function (article){
                
                coverImage = article.article_cover_image;
                if (!coverImage) {
                    coverImage = webUrl + 'mats/assets/img/main/img1.jpg';
                }
                
                articleUrl = webUrl + 'article/' + article.article_id;
                
                introText = '';
                if (article.article_content.length > 0) {
                    sep = article.article_content.indexOf('</p>');
                    if (sep !== -1) {
                        if (sep < 150) {
                            introText = article.article_content.substring(0, (sep + ('</p>'.length)));
                        }else{
                            introText = article.article_content.substring(0, (sep + 150));
                        }
                        
                    }else{
                        introText = article.article_content.substring(0, 150);
                    }
                    
                }
                
                content = '<div class="col-md-3 col-sm-6">';
                content += '<div class="thumbnails thumbnail-style thumbnail-kenburn">';
                content += '<div class="thumbnail-img">';
                    content += '<div class="overflow-hidden">';
                        content += '<img style="width:249px; height:158px;" class="img-responsive" src="' + coverImage + '" alt="">';
                    content += '</div>';
                    content += '<a class="btn-more hover-effect" href="' + articleUrl + '">อ่านเรื่องนี้ +</a>';
                content += '</div>';
                content += '<div class="caption">';
                    content += '<h3><a class="hover-effect" href="showArticle.php">' + article.article_headline + '</a></h3>';
                    content += '<p>' + introText + '</p>';
                    content += '</div>';
                content += '</div>';
                content += '</div>';
                
                articleList.append(content);
            });
            
            // pagination
            if (articleCount < limit) {
            
            }else{
                if (articleCount % limit === 0) {
                    pageAmount = (articleCount / limit);
                }else{
                    pageAmount = (articleCount / limit) + 1;
                }
                
                for(i=1;i<=pageAmount;i++){
                    classActive = '';
                    if (parseInt(pageVal) === i) {
                        classActive = 'active';
                    }
                    pageList.append('<li class="' + classActive + '"><a class="pageBtn" href="#">' + i + '</a></li>');
                    //pageList.append('<li><a href="#">' + i + '</a></li>');
                }
                
                $('#pageList li').on('click', function (e){
                    e.preventDefault();
                    newPage = parseInt($(this).text());
                    page.val(newPage);
                    getAllArticles();
                });
            }
            
        });
        
    }
    
});