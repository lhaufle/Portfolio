
//verify that the dom has loaded
window.addEventListener('load', () =>{
  
  //listen for a submit from general user info
  document.getElementById('user_info').addEventListener('click', function(e){
    //don't let the browser submit
    e.preventDefault();
    //get user input values
    let firstName = document.getElementById('first_name');
    let lastName = document.getElementById('last_name');
    let email = document.getElementById('email');
    //create xhr object
    let xhr = new XMLHttpRequest();
    //create request type
    xhr.open('POST', 'profile.php', true);
    //set headers for the post request
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //send the request
    xhr.send("fname="+firstName.value+"&lname="+lastName.value+"&email="+email.value);
    //show confirmation
    firstName.classList.add('is-valid');
    lastName.classList.add('is-valid');
    email.classList.add('is-valid');
    
  })

  //async request for password
  document.getElementById('passwordInfo').addEventListener('click', function(e){
    //get user input
    let password = document.getElementById('password');
    let repass = document.getElementById('repass');
    //verify the passwords match
    if(password.value == repass.value){
      e.preventDefault();
      //create object
      let xhr = new XMLHttpRequest();
      //create request
      xhr.open('POST', 'profile.php', true);
      //set headers
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      //send request
      xhr.send("password="+password.value);
      //show confirmation
      password.classList.add('is-valid');
      repass.classList.add('is-valid');
      
    } else {
      e.preventDefault();
      //display error if the password does not match
      document.getElementById('alert').classList.toggle('hide');
    }
         
})
  
})
