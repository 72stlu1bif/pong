//Server basic function
var handler = function(req, res) {
    fs.readFile('./index.html', function (err, data) {
        if(err) throw err;
        res.writeHead(200);
        res.end(data);
    });
}

var app = require('http').createServer(handler);
var io = require('socket.io').listen(app);
var fs = require('fs');
var port = 3333;
var paddleX1 = 202;//new user get the paddle-coordinate from this var
var paddleX2 = 202;

app.listen(port);

io.sockets.on('connection', function (socket) {
    console.log('someone connected')
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
        io.sockets.emit("set",{ position: paddleX1 } );
    });
    socket.on("paddleMoveRight",function(data){
        console.log("paddleMoveRight is required from user")
        paddleX = data.posX;
    });
    socket.on("paddleMoveLeft",function(data){
        console.log("paddleMoveLeft is requiredfrom user")
        paddleX = data.posX;
    });

    //to get paddle moved22222222222222
    socket.on("rightKeyDown2",function(){
        console.log("D is pressed")
        io.sockets.emit("moveRight2", );
    });
    socket.on("leftKeyDown2",function(){
        console.log("A is pressed")
        io.sockets.emit("moveLeft2", );
    });
    socket.on("rightKeyUp2",function(){
        console.log("D is released")
        io.sockets.emit("stopMoveRight2", );
    });
    socket.on("leftKeyUp2",function(){
        console.log("A is released")
        io.sockets.emit("stopMoveLeft2", );
    });
    socket.on("get2",function(){
        console.log("paddlePosition is required from user")
        io.sockets.emit("set2",{ position: paddleX2 } );
    });
    socket.on("paddleMoveRight2",function(data){
        console.log("paddleMoveRight is required from user")
        paddleX2 = data.posX;
    });
    socket.on("paddleMoveLeft2",function(data){
        console.log("paddleMoveLeft is requiredfrom user")
        paddleX2 = data.posX;
    });
});
