$(document).ready(function (){
    var voteBtn = $('#voteBtn');
    
    var inputRating = $('input[name="stars-rating"]');
    var voteComment = $('#voteComment');
    var voteBuyDate = $('#voteBuyDate');
    var voteBuyAmount = $('#voteBuyAmount');
    
    var voteAgreeReviewBtn = $('button[id^="agreeComment"]');
    var voteDisagreeReviewBtn = $('button[id^="disagreeComment"]');
    
    var rate = 0;
    
    voteBtn.click(sendVote);
    
    inputRating.click(function (){
        
        // Get rate as int
        rateId = $(this).prop('id');
        rateToken = rateId.split('-');
        rate = parseInt(rateToken[rateToken.length - 1]);
        
        console.log('vote ' + rate);
        
    });
    
    function sendVote() {
        
        console.log('vote');
        
        if (rate === 0) {
            return;
        }
        
        if (voteComment === '') {
            return;
        }
        
        if (!validateDateFormat(voteBuyDate.val())) {
            return;
        }
        
        if (isNaN(voteBuyAmount.val())) {
            return;
        }
        
        buyDate = getMySqlDateString(voteBuyDate.val());
        
        param = {
            'rate' : rate,
            'comment' : voteComment.val(),
            'buy_date' : buyDate,
            'buy_amount' : voteBuyAmount.val(),
            'project_id' : $('#projectId').val()
        };
        
        $.ajax({
            type : 'POST',
            url : webUrl + 'vote/send_vote_ajax',
            data : param
        }).done(function (data){
            if (data !== '1') {
                console.log(data);
                return;
            }
            
            $('#voteForm').modal('toggle');
            voteComment.val('');
            voteBuyDate.val('');
            voteBuyAmount.val('');
            
            location.reload();
            
        });
        
    }
    
    voteAgreeReviewBtn.click(sendVoteReview);
    voteDisagreeReviewBtn.click(sendVoteReview);
    
    function sendVoteReview() {
        idText = $(this).prop('id');
        idTextArray = idText.split('-');
        
        reviewId = idTextArray[1];
        
        // Get agree value
        op = idTextArray[0];
        agree = 0;
        if (op === "agreeComment") {
            agree = 1;
        }
        
        param = {
            'review_id' : reviewId,
            'agree' : agree
        };
        
        agreeBtn = $('#agreeComment-'+reviewId);
        disagreeBtn = $('#disagreeComment-'+reviewId);
        
        $.ajax({
            type : 'POST',
            url : webUrl + 'vote/send_vote_review_ajax',
            data : param
        }).done(function (data){
            if (data !== "1") {
                console.log(data);
                return;
            }
            
            // Mange button after vote
            agreeBtn.removeClass('btn-success');
            disagreeBtn.removeClass('btn-danger');
            disagreeBtn.addClass('btn-default');
            agreeBtn.addClass('btn-default');
            agreeBtn.prop('disabled', true);
            disagreeBtn.prop('disabled', true);
            
        });
    }
    
});