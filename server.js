var io = require('socket.io').listen(80);

io.sockets.on('connection', function (socket) {
  socket.on('message', function () { });
  socket.on('disconnect', function () { });

  // more stuff here
  if(somethingChanged) {
    socket.send(JSON.stringify({changed: true, file: 'file1.txt', newContent: 'Im fresh off the press yo!'});
  }
});