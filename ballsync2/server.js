//Server basic function
var handler = function(req, res) {
    fs.readFile('./client.html', function (err, data) {
        if(err) throw err;
        res.writeHead(200);
        res.end(data);
    });
}

var app = require('http').createServer(handler);
var io = require('socket.io').listen(app);
var fs = require('fs');
var port = 3333;
app.listen(port);
console.log('Server running on port 3333');

//Game
var canvasWidth = 480;
var canvasHeight = 620;
var ballRadius = 10;
var x = 240 //canvas.width/2;
var y = 290 //canvas.height-30;
var dx = 2;
var dy = -2;
var paddleHeight = 10;
var paddleWidth = 75;
var paddleX = (canvasWidth-paddleWidth)/2;
var rightPressed = false;
var leftPressed = false;

var paddleHeight2 = 10;
var paddleWidth2 = 75;
var paddleX2 = (canvasWidth-paddleWidth2)/2;
var rightPressed2 = false;
var leftPressed2 = false;

function calculate() {
    //ball
    if(x + dx > canvasWidth-ballRadius || x + dx < ballRadius) {
        dx = -dx;
    }
    if(y + dy > canvasHeight-ballRadius || y + dy < ballRadius) {
        dy = -dy;
    }
    x += dx;
    y += dy;

    //paddle
    if(rightPressed && paddleX < canvasWidth-paddleWidth) {
        paddleX += 5;
    }
    if(leftPressed && paddleX > 0) {
        paddleX -= 5;
    }

    if(rightPressed2 && paddleX2 < canvasWidth-paddleWidth2) {
        paddleX2 += 5;
    }
    if(leftPressed2 && paddleX2 > 0) {
        paddleX2 -= 5;
    }
}
setInterval(calculate, 10);


//sockets
io.sockets.on('connection', function (socket) {
    console.log('someone connected')

    //to initialize ball&paddle coordinates
    socket.on("getCoordinates",function(){
        io.sockets.emit("setCoordinates",{ positionX:x,positionY:y,paddleX:paddleX, paddleX2:paddleX2 } );
    });

    //Control paddles
    socket.on("rightKeyDown",function(){
        console.log("rightKey is pressed");
        rightPressed = true;
    });
    socket.on("leftKeyDown",function(){
        console.log("leftKey is pressed");
        leftPressed = true;
    });
    socket.on("rightKeyUp",function(){
        console.log("rightKey is released");
        rightPressed = false;
    });
    socket.on("leftKeyUp",function(){
        console.log("leftKey is released");
        leftPressed = false;
    });
    socket.on("rightKeyDown2",function(){
        console.log("D is pressed");
        rightPressed2 = true;
    });
    socket.on("leftKeyDown2",function(){
        console.log("A is pressed");
        leftPressed2 = true;
    });
    socket.on("rightKeyUp2",function(){
        console.log("D is released");
        rightPressed2 = false;
    });
    socket.on("leftKeyUp2",function(){
        console.log("A is released");
        leftPressed2 = false;
    });
});
