function openNav() {
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
if(screen.width < 760){
  document.getElementById("myOffcanvas").style.width = "100%";
} else if(screen.width < 1024){
  document.getElementById("myOffcanvas").style.width = "70%";
} else {
  document.getElementById("myOffcanvas").style.width = "40%";
}
}

function closeNav() {
  document.getElementById("myOffcanvas").style.width = "0";
  document.body.style.backgroundColor = "white";
}