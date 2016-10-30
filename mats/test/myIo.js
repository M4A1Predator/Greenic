
var socket = io('http://127.0.0.1:3001');

socket.on('response_message', function(data){
    $('#field').html(data.msg);
});

$('#btn').click(function (e){
    e.preventDefault();
    
    //socket.emit('send_msg', {"msg": "get rekt"});
    $.ajax({
        type : 'post',
        url : 'http://127.0.0.1/greenic/Test/test_io/test_chat',
        data : { msg : 'test msg'},
    }).done(function (data){
        console.log(data);
    });
    
});