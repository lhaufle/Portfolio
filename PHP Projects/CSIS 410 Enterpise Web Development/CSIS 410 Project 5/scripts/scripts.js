//Make sure the page is loaded first
window.addEventListener("load", function(){
  
//store main page button into variable
var btn = document.getElementById("main-pg-button");
 
//add an event listener for drop down
btn.addEventListener("click", function(){
  var menu = document.getElementById("dropDown");
  menu.classList.toggle("invisDrop");
})
  
  
})