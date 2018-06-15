//Server core functions
var express = require("express");
var http = require("http");
var socketio = require("socket.io");
var app = express();

app.get("/", function (req, res) {
    res.sendFile(__dirname + "/index.html");
});
app.get("/index.html", function (req, res) {
    res.sendFile(__dirname + "/index.html");
});
app.get("/client.html", function (req, res) {
    res.sendFile(__dirname + "/client.html");
});

var server = http.createServer(app).listen(3333);
console.log('Server running on port 3333!');

//Socket&Game
var io = socketio(server);
var paddleX2 = 202;//new user get the paddle-coordinate from here

io.on("connection", function (socket) {
    console.log('someone connected')
    //when user clicks display,following message is shown
    socket.on("click",function(){
        console.log("click")
        io.sockets.emit("msg",{ message: "You clicked display!" } );
    });
    //to get paddle moved
    socket.on("rightKeyDown",function(){
        console.log("rightKey is pressed")
        io.sockets.emit("moveRight", );
    });
    socket.on("leftKeyDown",function(){
        console.log("leftKey is pressed")
        io.sockets.emit("moveLeft", );
    });
    socket.on("rightKeyUp",function(){
        console.log("rightKey is released")
        io.sockets.emit("stopMoveRight", );
    });
    socket.on("leftKeyUp",function(){
        console.log("leftKey is released")
        io.sockets.emit("stopMoveLeft", );
    });
    socket.on("get",function(){
        console.log("paddlePosition is required from user")
        io.sockets.emit("set",{ position: paddleX2 } );
    });
    socket.on("paddleMoveRight",function(data){
        console.log("paddleMoveRight is required from user")
        paddleX2 = data.posX;
    });
    socket.on("paddleMoveLeft",function(data){
        console.log("paddleMoveLeft is requiredfrom user")
        paddleX2 = data.posX;
    });
    socket.on("reload1",function(data){
        console.log("A User has Start Button clicked")
        io.sockets.emit("reload2");
    });
});

io.on("disconnect", function (socket) {
    console.log('someone disconnected')
});
