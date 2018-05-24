//source https://byuzensen.com/node-js-express
var app = require('express')();//to use express
var http = require('http').Server(app);//Communication through express
var io = require('socket.io')(http);//to use socket
var POST = 3000;//localhost:3000

//The Process when a client reach the route directory
app.get('/', function(req, res) {
  //The Server redirect this client to index.html
  res.sendFile(__dirname + '/index.html');
});

//The Process when a client connect "socket.io"
io.on('connection', function(socket) {
  //show unique ID in console(command prompt), which assigned to a client when he connected the server
  console.log('Newly joined ID : %s', socket.id);

  //When a client connect newly, it is broadcasted to all clients（through the Event "message"）
  io.emit('message', socket.id + 'is entered to the room!', 'System');

  //When the server get the event "message" from a client,
  //this part shows all clients new message and id
  socket.on('message', function(msj) {
    io.emit('message', msj, socket.id);
  });

  //When a client disconnect internet or close the window
  //this part shows in console(command prompt) all clients, which ID has disconnected
  socket.on('disconnect', function(e) {
    console.log('disconnected ID : %s', socket.id);
  });
});

//the Server wait for the connection
http.listen(POST, function() {
  console.log('start connection', POST);
});
