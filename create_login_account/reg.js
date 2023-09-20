
// start landing page here



// start open registration tabs 
function openSecondTab(){
    document.querySelector("#firstTabs").style.display = "none";
    document.querySelector("#secondTabs").style.display = "block";
}

function returnTabA(){
    document.querySelector("#firstTabs").style.display = "block";
    document.querySelector("#secondTabs").style.display = "none";

}

function openTabC(){
    document.querySelector("#firstTabs").style.display = "none";
    document.querySelector("#secondTabs").style.display = "none";
    document.querySelector("#thirdTabs").style.display = "block";

}

function returnTabB(){
    document.querySelector("#firstTabs").style.display = "none";
    document.querySelector("#secondTabs").style.display = "block";
    document.querySelector("#thirdTabs").style.display = "none";

}

function returnAll(){
    document.querySelector(".register").style.display = "none";
    document.querySelector("#password").style.display = "none";
    document.querySelector("#create").style.display = "block";
    document.querySelector("#firstTabs").style.display = "none";
    document.querySelector("#secondTabs").style.display = "none";
    document.querySelector("#thirdTabs").style.display = "block";

}

// close alert here 
function closemessage(){
    document.querySelector(".erroring").style.display = "none";
}
// end open registration tabs 
const all    = document.querySelector("#showNewPassword[type='password']");
const passwordBtn  = document.querySelector("#show2");

passwordBtn.onclick = ()=>{
    if(all.type == "password"){
        all.type = "text";
        passwordBtn.classList.add("active2");
    }
    else{
        all.type = "password";
        passwordBtn.classList.remove("active2");
    }
}


const CPAss    = document.querySelector("#showComfirmPassword[type='password']");
const CpassBtn  = document.querySelector("#show3");

CpassBtn.onclick = ()=>{
    if(CPAss.type == "password"){
        CPAss.type = "text";
        CpassBtn.classList.add("active3");
    }
    else{
        CPAss.type = "password";
        CpassBtn.classList.remove("active3");
    }
}



function Send_Data() {
    const form = document.querySelector("#form");
    form.onload =(e)=>{
        e.preventDefault();
    }
    
    var httpr = new XMLHttpRequest();
    httpr.open("POST","../controller/checkuser.php",true);
    httpr.onload = ()=>{
        if(httpr.readyState === XMLHttpRequest.DONE) {
            
            if(httpr.status === 200){
                let formData = httpr.response;
                document.getElementById("response").innerHTML = formData;
            }
            
        }
    }
    let data = new FormData(form);
    httpr.send(data);
}



// start landing page here


function register(){
    document.querySelector("#login").style.display = "block";
    document.querySelector(".register").style.display = "none";
}
function forgot(){
    document.querySelector(".register").style.display = "none";
    document.querySelector("#password").style.display = "block";
}


function closemessage(){
    document.querySelector(".erroring").style.display = "none";
}
// end open registration tabs 
const alla    = document.querySelector(".register .login-body .form-group input[type='password']"),
passwordBtna  = document.querySelector(".register .login-body .form-group #show1");

passwordBtna.onclick = ()=>{

    if(alla.type == "password"){
        alla.type = "text";
        passwordBtna.classList.add("active");
    }
    else{
        alla.type = "password";
        passwordBtna.classList.remove("active");
    }
}



function Send_Data() {
    const form = document.querySelector("#form");
    form.onload =(e)=>{
        e.preventDefault();
    }
    
    var httpr = new XMLHttpRequest();
    httpr.open("POST","../controller/checkuser.php",true);
    httpr.onload = ()=>{
        if(httpr.readyState === XMLHttpRequest.DONE) {
            
            if(httpr.status === 200){
                let formData = httpr.response;
                document.getElementById("response").innerHTML = formData;
            }
            
        }
    }
    let data = new FormData(form);
    httpr.send(data);
}


