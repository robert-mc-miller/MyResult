var email = document.querySelector('#email');
var error = document.querySelector('#emailAt');
var at = false;

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

  
