window.addEventListener("load", function(){
  
  var button = document.getElementById("submit");
  
  button.addEventListener("click", function(){
    
    logOut();
    
  })
  
  function logOut(){
    if(confirm("Are you sure you want to logOut?")){
      window.location.href = "logout.php";
    }
  }
  
  
})