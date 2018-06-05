Written by Sota

These codes are the test, to get a Objects(paddle) synchron moved by multiple users.
i.e.When a user moves his paddle in his browser, paddles in other users broser move accordingly.
 
-----------------------------------------------------	

if you haven't yet installed NodeJS
-install NodeJS

Then do the following steps
-Move in Command Prompt to this "PaddleMove" folder
    cd

-install socket.io
    npm install socket.io

-install express
    npm install express

-create an empty "package.json" file.
 put the following code inside.

 {
    "name": "SocketioExample",
    "version": "0.0.1",
    "description": "SocketioExample",
    "dependencies": {
        "socket.io": "latest",
    },
    "author": "dev"
}

-run install command
    npm install

-run Node
    node server.js

-open browser, type in url
    localhost:3333


<End>
