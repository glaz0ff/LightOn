const express = require("express");
const net = require("net");
const app = express();

let connection;
let socket = net.createServer(createSocket);
let port = 20223;
let ip = '45.141.102.163';
socket.listen(port, ip);

let status = true;
let anyoneConnected = false;

app.get("/index", function(request, response)
{
    if (!anyoneConnected)
        response.send("Needs to turn on system first\n");
    else
        response.sendFile(__dirname + "index.php");
});

app.get("/switch", function(request, response){
    if (anyoneConnected)
        status = !status;
});

app.get("/switchinfo", function(request, response){
    response.send(status);
});

function createSocket(socket)
{
    if (anyoneConnected == = true)
    {
        socket.write("Someone already connected!\n");
        socket.destroy();
        return;
    }
    console.log("Connection established!\n");
    anyoneConnected = true;
    connection = socket;
    socket.on('data', function(data)
    {
        if (data.toString() == = "get")
        {
            if (status)
                socket.write("1");
            else
                socket.write("0");
        }
    });
    socket.on('end', function()
    {
        console.log("Connection closed\n");
        anyoneConnected = false;
    });
}

app.listen(2022);
