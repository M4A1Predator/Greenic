
var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require('socket.io').listen(server);

users = [];
connections = [];

server.listen(3001);
console.log('server running on port 3001');

app.get('/', function(req, res){
	res.sendFile(__dirname + '/pubs/index.html');
});

io.sockets.on('connection', function(socket){
    connections.push(socket);
    // On init
    console.log('Connected : ' + connections.length + ' sockets connected');
    
    // Test
    socket.on('send_msg', function (data){
		console.log(data);
        console.log('send_msg : ' + data.msg);
		
		socket.broadcast.emit('response_message', data);
		
    });
    
    // Bind events
    socket.on('send_message', function (data){
        socket.broadcast.emit('response_message', data);
    });
    
    // On disconnected
    socket.on('disconnect', function (data){
        connections.splice(connections.indexOf(socket), 1);
        console.log('Disconnected : ' + connections.length + ' sockets connected');
    });
    
});
