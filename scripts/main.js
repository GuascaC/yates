'use strict';
function PassV() {
  var x = document.getElementById("iPass");
  if (x.type === "password") {
    x.type = "text";
  }else{
    x.type = "password";
  }
}
function PassV02() {
  var y = document.getElementById("iPass2");
  if (y.type === "password") {
    y.type = "text";
  }else{
    y.type = "password";
  }
}
  