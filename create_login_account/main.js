
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
const all    = document.querySelector(".register .login-body .form-group input[type='password']"),
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


let loaderGreen = document.querySelector("#shows-green"),
hideAlert       = document.querySelector("#position-fixed-green"),
percentage = document.querySelector("#percentAll");

let loaderStartAll = 0, loaderEndAll = 100, loaderTimeAll = 30;

let startAll = setInterval(() => {
    loaderStartAll++;

    percentage.textContent = loaderStartAll+'%';
    loaderGreen.style.width = `${loaderStartAll}%`;
    
    if(loaderStartAll == loaderEndAll){
        clearInterval(startAll);
        hideAlert.style.display = "none";
    }
},loaderTimeAll);


let loaderGreene = document.querySelector("#shows-greene"),
hideAlerte       = document.querySelector("#position-fixed-greene"),
percentagee = document.querySelector("#percentAlle");

let loaderStartAlle = 0, loaderEndAlle = 100, loaderTimeAlle = 30;

let startAlle = setInterval(() => {
    loaderStartAlle++;

    percentagee.textContent = loaderStartAlle+'%';
    loaderGreene.style.width = `${loaderStartAlle}%`;


    if(loaderStartAlle == loaderEndAlle){
        clearInterval(startAlle);
        hideAlerte.style.display = "none";
    }
},loaderTimeAlle);