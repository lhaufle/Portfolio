//make sure the dom has loaded
window.addEventListener('load', () => {
 
  //pevent the form from submitting if the passwords do not match
  document.getElementById('submit').addEventListener('click', function(e) {
      let password = document.getElementById('password').value;
      let repass = document.getElementById('repass').value;
      let errorMessage = document.getElementById('password_error');
    
      if(password != repass){
        e.preventDefault();
        errorMessage.classList.toggle('password_error');
        document.getElementById('repass').style.backgroundColor = 'red';
        document.getElementById('password').style.background = 'red';
      } 
  })
})
