function chatGl(){
    document.getElementById("chat-gl").style.display = "block";
    document.getElementById("chat-sl").style.display = "none";
}
function chatSl(){
    document.getElementById("chat-gl").style.display = "none";
    document.getElementById("chat-sl").style.display = "block";

}
// requeted javaScript
function requested(){
    document.getElementById("requested").style.display = "block";
    document.getElementById("request").style.display = "none";
}
function request(){
    document.getElementById("requested").style.display = "none";
    document.getElementById("request").style.display = "block";

}

// const dropProfile = document.querySelector("#drop-pro");


function toggleProfileBtn(){

       var ids = document.getElementById("drop-pro");

       if(ids.style.display == "none"){
           ids.style.display = "block";
       }
       else{
            ids.style.display = "none";
       }
}


function mobileToggleProfileBtn(){

    document.getElementById("drop-pro").style.display = "block";

    
}

function mobileToggleProfileBtnDt(){

    document.getElementById("drop-pro").style.display = "none";

    
}

// group or private chat 

function openMessage(){
    var postBlock = document.getElementById("postBlock");
    var findpeople = document.getElementById("findpeople");
    var chatandgroup = document.getElementById("chatandgroup");
    
    postBlock.style.display = "none";
    findpeople.style.display = "none";
    chatandgroup.style.display = "block";
}

// search new friends 

function openPeople(){
    var postBlock = document.getElementById("postBlock");
    var findpeople = document.getElementById("findpeople");
    var chatandgroup = document.getElementById("chatandgroup");
    
    postBlock.style.display = "none";
    findpeople.style.display = "block";
    chatandgroup.style.display = "none";
}

// open home page or posting 
function openHomePage(){
    var postBlock = document.getElementById("postBlock");
    var findpeople = document.getElementById("findpeople");
    var chatandgroup = document.getElementById("chatandgroup");
    
    postBlock.style.display = "block";
    findpeople.style.display = "none";
    chatandgroup.style.display = "none";
}



function openPrivateDrop(){
    document.querySelector("#private_drop").style.display = "block";
    document.querySelector("#openPrivateDrop").style.display = "none";
    document.querySelector("#closePrivateDrop").style.display = "block";
}

function closePrivateDrop(){
    document.querySelector("#private_drop").style.display = "none";
    document.querySelector("#openPrivateDrop").style.display = "block";
    document.querySelector("#closePrivateDrop").style.display = "none";

}