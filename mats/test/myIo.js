
var socket = io('http://127.0.0.1:3001');

socket.on('server_get_msg', function(data){
    $('#field').html(data.msg);
});

$('#btn').click(function (e){
    e.preventDefault();
    
    socket.emit('send_msg', {"msg": "get rekt"});
    
});