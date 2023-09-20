let userName = document.querySelector("#validation");
let redVal   = document.querySelector(".red");
let greenVal   = document.querySelector(".green");

userName.onkeyup = ()=>{
    if(userName.value == ""){
        console.log("empty");
        userName.style.border = "solid 1px rgb(253, 51, 51)";
        redVal.style.display = "block";
        greenVal.style.display = "none";
        
    }
    else{
        console.log("suucesss");
        userName.style.border = "solid 1px rgb(19, 190, 19)";
        greenVal.style.display = "block";
        redVal.style.display = "none";
        
    }

    
}




// email 



const email = document.querySelector("#email");
const emailVal   = document.querySelector("#red");
const emailRed   = document.querySelector("#green");

email.onkeyup = ()=>{
    if(email.value == ""){
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
