let passwordLogin = document.querySelector("#passwordLogin");

passwordLogin.onkeyup = ()=>{
    let redVal   = document.querySelector(".red");
    let greenVal   = document.querySelector(".green");
    if(passwordLogin.value === ""){
        console.log("empty");
        passwordLogin.style.border = "solid 1px rgb(253, 51, 51)";
        redVal.style.display = "block";
        greenVal.style.display = "none";
        
    }
    else{
        console.log("suucesss");
        passwordLogin.style.border = "solid 1px rgb(19, 190, 19)";
        greenVal.style.display = "block";
        redVal.style.display = "none";
        
    }

    
}




// email 



const email = document.querySelector("#email");

email.onkeyup = ()=>{
    const emailVal   = document.querySelector("#red");
    const emailRed   = document.querySelector("#green");
    if(email.value === ""){
        console.log("empty");
        email.style.border = "solid 1px rgb(253, 51, 51)";
        emailVal.style.display = "block";
        emailRed.style.display = "none";
        
    }
    else{
        console.log("suucesss");
        email.style.border = "solid 1px rgb(19, 190, 19)";
        emailRed.style.display = "block";
        emailVal.style.display = "none";
        
    }

    
}
