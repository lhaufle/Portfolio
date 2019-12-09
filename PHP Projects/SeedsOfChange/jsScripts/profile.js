//not complete,validation to still be added


//verify that the dom has loaded
window.addEventListener('load', () =>{
  
  //listen for a submit from general user info
  document.getElementById('user_info').addEventListener('click', function(){
    
    //get user input values
    let firstName = document.getElementById('first_name').value;
    let lastName = document.getElementById('last_name').value;
    let email = document.getElementById('email').value;
    //create xhr object
    let xhr = new XMLHttpRequest();
    //create request type
    xhr.open('POST', 'profile.php', true);
    //set headers for the post request
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //send the request
    xhr.send("fname="+firstName+"&lname="+lastName+"&email="+email);
    
  })

  //async request for password
  document.getElementById('passwordInfo').addEventListener('click', function(){
    //get user input
    let password = document.getElementById('password').value;
    let repass = document.getElementById('repass').value;
    //verify the passwords matched
    
      //create object
      let xhr = new XMLHttpRequest();
      //create request
      xhr.open('POST', 'profile.php', true);
      //set headers
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      //send request
      xhr.send("password="+password);
      
    
      
})
  
 
})
