//verify that the window has loaded
window.addEventListener('load', () => {
  
  //get dom element to show form
  let forgotButton = document.getElementById('passwordButton');
  
  //assign event listener to button
  forgotButton.addEventListener('click', ()=>{
    //get form
    let resetForm = document.getElementById('passwordReset');
    //toggle visibility of the form
    resetForm.classList.toggle('passwordReset');
    
  })
 
})
