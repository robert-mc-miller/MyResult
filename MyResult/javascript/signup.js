// define variables
var email = document.querySelector('#email');
var error = document.querySelector('#emailAt');
var at = false;

// at a set time interval check if the the includes @
// if the email has included at before and does not now display error
// otherwise hide the error
setInterval(function(){ 

    if(email) {
        if(email.value && email.value.includes('@')) {
             if (at == false){
                at = true;
        }
        error.style.display = "none";
      } else if(at == true) {
        error.style.display = "block";
      }
    }

}, 1000);

  
