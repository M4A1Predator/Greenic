
var express = require('express');
var app = express();
var fs = require('fs');

var options = {
  key: fs.readFileSync('./pvk.pem'),
  cert: fs.readFileSync('./cert.pem')
};

var server = require('https').createServer(options, app);
var io = require('socket.io').listen(server);

users = [];
connections = [];

port = 2053;

server.listen(port);
console.log('server running on port ' + port);

app.get('/', function(req, res){
	//res.sendFile(__dirname + '/pubs/index.html');
    console.log('get home');
    res.send('Hello this is server');
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
