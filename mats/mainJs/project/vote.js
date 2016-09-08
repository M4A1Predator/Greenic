$(document).ready(function (){
    var voteBtn = $('#voteBtn');
    
    var inputRating = $('input[name="stars-rating"]');
    var voteComment = $('#voteComment');
    var voteBuyDate = $('#voteBuyDate');
    var voteBuyAmount = $('#voteBuyAmount');
    
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
    
});