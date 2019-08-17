window.addEventListener("load", function(){
  //make sure name is filled out. 
  document.getElementById("submit").addEventListener("click", function(event){
  var nameEntry = document.getElementById("name").value;
  
  if (nameEntry == null || nameEntry == ""){
    event.preventDefault();
    alert("You must enter your name before submitting");
  }
})
  
})