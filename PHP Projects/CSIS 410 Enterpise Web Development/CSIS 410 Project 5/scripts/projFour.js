
window.addEventListener("load", function(){ //make sure page is loaded before scripts can execute

  var selection = document.getElementById("info"); //grab select node

selection.addEventListener("change", function(){ //listen for change in dropdown box
/*-----------------------------------------------
Event listener that detects when the dropdown box has been changed.
Will change action based on select as well as the first label
------------------------------------------------*/
     var word = document.getElementById("info").value; //store value of the user selction in variable

     if(word == "Adelynn" || word == "Aven" || word == "Grayson"){
           changeTitle("Age:"); //change Current Position to age if one of the children are selected
     }else {
           changeTitle("Current Position: "); //Default back to Current position if child not selected
     }
  
     phpAction = document.getElementById("directPage"); //grab the form node

     changeAction(word, phpAction); //change action property based on user selection
});
  
document.getElementById("proj-four-button").addEventListener("click", function(e){ //verify a name was selected
/*-----------------------------------------------
Event listener that verifies a name was selected and alerts user
if the value was null or empty.
------------------------------------------------*/
   var name = document.getElementById("info").value;
   
   if(name == "Select"){
     e.preventDefault();
     alert("You must select a name");
   }
  
})
  
function changeTitle(x){
  /*------------------------------------------- 
  Change title take a string as an argumment and
  changes the html to match the passed argument.
  --------------------------------------------*/
     ctitle = document.getElementById("age"); //grab node
     ctitle.innerHTML = x; //assign new html
}

function changeAction(name, phpAct){
 /*------------------------------------------- 
 changeAction takes the value of selection and
 the form node as an argument and changes the 
 action property based on the selected name.
  --------------------------------------------*/
     switch(name){
     case "Adelynn":
           phpAct.removeAttribute("action");
           phpAct.setAttribute("action","Adelynn.php");
     break;
     case "Ashley":
           phpAct.removeAttribute("action");
           phpAct.setAttribute("action","Ashley.php");
     break;
     case "Aven":
           phpAct.removeAttribute("action");
           phpAct.setAttribute("action","Aven.php");
     break;
     case "Grayson":
           phpAct.removeAttribute("action");
           phpAct.setAttribute("action","Grayson.php");
     break;
     case "Larry":
           phpAct.removeAttribute("action");
           phpAct.setAttribute("action","Larry.php");
     break;
     }
}
  
})