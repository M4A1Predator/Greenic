$(document).ready(function (){
    var rateStar = $('.rateStar');
    var memberReviews = $('#memberReviews');
    
    var voteAgreeReviewBtn = $('button[id^="agreeComment"]');
    var voteDisagreeReviewBtn = $('button[id^="disagreeComment"]');
    
    var reviewIds = $('input[id^="reviewId"]');
    
    // Init
    //setVoteResultList();
    setVoteReviewResult();
    
    function setVoteResultList() {
        
        param = {
            'project_id' : $('#projectId').val(),
        };
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'vote/get_project_reviews_ajax',
            data : param
        }).done(function (data){
            jsonData = JSON.parse(data);
            
            // Get data
            reviewRate = parseInt(jsonData.review_rate);
            reviewRateSelectArray = jsonData.rate_select_arr;
            reviewArray = jsonData.reviews;
            
            // Set stars
            for (i=1;i<=reviewRate;i++) {
                star = rateStar.eq(i-1);
                star.removeClass('fa-star-o');
                star.addClass('fa-star');
            }
            
            $("#rateResult-5").html(reviewRateSelectArray[4]);
            $("#rateResult-4").html(reviewRateSelectArray[3]);
            $("#rateResult-3").html(reviewRateSelectArray[2]);
            $("#rateResult-2").html(reviewRateSelectArray[1]);
            $("#rateResult-1").html(reviewRateSelectArray[0]);
            
            // Set review list
            reviewArray.forEach(function (review){
                
                thisRate = parseInt(review.review_rate);
                starList = '';
                for (i=1;i<=5;i++) {
                    if (i <= thisRate) {
                        starList += '<i class="fa fa-star" aria-hidden="true"></i>';
                    }else{
                        starList += '<i class="fa fa-star-o" aria-hidden="true"></i>';
                    }
                }
                
                if (!review.member_img_path) {
                    review.member_img_path = memberDefaultImagePath;
                }
                
                nameText = review.member_firstname;
                if (review.member_lastname) {
                    nameText += (' ' + review.member_lastname);
                }
                
                buyAmountText = review.review_buyamount + ' ' + $('#unitText').val();
                addressText = '';
                if (review.member_district && review.member_province) {
                    addressText = review.member_district + ', ' + review.member_province;
                }
                
                content = '<div class="col-md-12 margin-bottom-10">';
                    content += '<div class="testimonials-info rounded-bottom bg-color-light">';
                        content += '<img class="rounded-x" src="' + webUrl + review.member_img_path + '" alt="">';
                        content += '<div class="testimonials-desc">';
                            content += '<p>' + review.review_comment + '</p>';
                                content += '<div class="resultRate">' + review.review_rate;
                                content += starList;
                                content += '</div>';
                                content += '<strong> ' + nameText + ' <small>(สั่งซื้อ ' + buyAmountText + ')</small></strong>';
                                content += '<span class="coverLocation"><i class="fa fa-map-marker"></i>' + addressText + '</span>';
                                content += '<button class="btn btn-xs rounded btn-success" type="button"><i class="fa fa-thumbs-up" aria-hidden="true"></i> เห็นด้วย (20)</button>';
                                content += '<button class="btn btn-xs rounded btn-danger" type="button"><i class="fa fa-thumbs-down" aria-hidden="true"></i> ไม่เห็นด้วย (5)</button>';
                            content += '</div>';
                        content += '</div>';
                    content += '</div>';
                    
                memberReviews.append(content);
            });
            
        });
        
    }
    
    function setVoteReviewResult() {
        
        param = {
            'project_id' : $('#projectId').val()
        };
        
        $.ajax({
            type : 'GET',
            url : webUrl + 'vote/get_vote_reviews_of_project_ajax',
            data : param
        }).done(function (data){
            jsonData = JSON.parse(data);
            voteReviewArray = jsonData.result;
            
            // Setting review data
            reviewIds.each(function (){
                reviewId = getElementIdFromId($(this).prop('id'));
                agreeAmount = 0;
                disagreeAmount = 0;
                
                voteReviewArray.forEach(function (vr){
                    if (parseInt(vr.vote_review_review_id) === parseInt(reviewId)) {
                        if (vr.vote_review_agree === '1') {
                            agreeAmount += 1;
                            console.log('agree');
                        }else{
                            disagreeAmount += 1;
                        }
                        
                        // Check have ever voted by member id
                        if (vr.vote_review_member_id == $('#memberId').val()) {
                            // Mange button after vote
                            aBtn = $('#agreeComment-' + reviewId);
                            daBtn = $('#disagreeComment-' + reviewId);
                            
                            aBtn.removeClass('btn-success');
                            daBtn.removeClass('btn-danger');
                            daBtn.addClass('btn-default');
                            aBtn.addClass('btn-default');
                            aBtn.prop('disabled', true);
                            daBtn.prop('disabled', true);
                        }
                    }
                });
                $('#agreeAmount-' + reviewId).html(agreeAmount);
                $('#disagreeAmount-' + reviewId).html(disagreeAmount);

            });
            // End review loop
            
            
        });
    }
    
});