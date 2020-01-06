

require('./bootstrap');

setTimeout(function () {
    $('.alert').slideUp(200);
    
},3000);




//socket io
// var app = require('express')();
// var http = require('http').Server(app);
// var io = require('socket.io')(http);
//
// app.get('/', function(req, res){
//   res.sendfile('index.html');
// });
//
// io.on('connection', function(socket){
//   socket.on('chat message', function(msg){
//     console.log('message: ' + msg);
//     io.emit('chat message', msg);
//   });
// });
//s
// http.listen(3000, function(){
//   console.log('listening on *:3000');
// });
//


