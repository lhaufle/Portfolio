window.addEventListener("load", function(){
  
 $change("aboutHover", "about"); //for about dropdown
 
 $change("serviceHover", "services"); //for service dropdown
  
 $change("reviewHover", "reviews"); //for reviews dropdown
  
 $change("contactHover", "contacts"); //for contact drowdown
  
/*--------------------------------------
$change takes two id's as an argument for 
the drop down to work
--------------------------------------*/

 function $change(parent, child){
   
  var x = document.getElementById(parent); //get parent element
   
  x.addEventListener("click", function(){ //set listener for parent
    
       var y = document.getElementById(child); //get node for child div
    
    y.classList.toggle("invisible"); //toggle class on child div to make it visible
    
 })
   
}
   
/*------------------------------------------
sessions rating page verification
-------------------------------------------*/
var button = document.getElementById("ratingSubmit");

button.addEventListener("click", function(e){
var comment = document.getElementById('text').value //get input of name textbox
var commenter = document.getElementById("name").value; //get input of textarea 
  
if(commenter == "" || commenter == null){ //verify that the name was inputed
  e.preventDefault();
  alert("You must Enter Your Name");
}else if(comment == "" || comment == null){ //verify a comment was entered
  e.preventDefault();
  alert("You must enter a comment");
}



  
  
})
  
  
  
})