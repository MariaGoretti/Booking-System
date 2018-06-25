<?php 
var source = new EventSource('/newFile');

source.addEventListener('hello', function(e) {
  // Use AJAX and pull new file here
}, false);
?>