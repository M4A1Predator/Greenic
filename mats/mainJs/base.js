var origin = location.origin;
var protocol = location.protocol;
var hostname = location.hostname;

var webUrl = origin + '/greenic/';

function sleep(milliseconds){
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}