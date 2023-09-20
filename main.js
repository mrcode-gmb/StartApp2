
// start landing page here


function register(){
    document.querySelector("#login").style.display = "block";
    document.querySelector(".register").style.display = "none";
}
function forgot(){
    document.querySelector(".register").style.display = "none";
    document.querySelector("#password").style.display = "block";
}

// end land page page 



const all    = document.querySelector(".register .login-body .form-group #showpassword[type='password']"),
passwordBtn  = document.querySelector(".register .login-body .form-group #show1");

passwordBtn.onclick = ()=>{

    if(all.type == "password"){
        all.type = "text";
        passwordBtn.classList.add("active");
    }
    else{
        all.type = "password";
        passwordBtn.classList.remove("active");
    }
}



// login page javaScript show password and hide 