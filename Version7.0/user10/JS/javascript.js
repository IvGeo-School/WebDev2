var space = " ";
var pos = 0;
var msg = "Sneaker Mania";

function Scroll(){
document.title = msg.substring(pos, msg.length) + space +msg.substring(0,pos);

pos++;
if (pos > msg.length) pos = 0;
window.setTimeout("Scroll()", 0);
}
Scroll();
function message() {
    alert("This alert box was triggered by the onreset event handler");
  }