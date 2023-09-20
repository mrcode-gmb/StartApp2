setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "select_friend.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){

                let data = xhr.response;
                document.querySelector("#chat-sl").innerHTML = data;
            }
        }
    }
    xhr.send();
}, 1000);


function sendBtn(){
    const formMess = document.querySelector("#send_message"),
    inputChat = formMess.querySelector("#input-message");
    const messBody = document.querySelector("#show-message-chat");

    formMess.onsubmit = (e)=>{
        e.preventDefault();
    }

    let xhr1 = new XMLHttpRequest();
    xhr1.open("POST", "insert_message.php", true);
    xhr1.onload = ()=>{
        if(xhr1.readyState === XMLHttpRequest.DONE){
            if(xhr1.status === 200){
                inputChat.value = "";
                // console.log(xhr1.response);
            }
        }
    }
    let messageContent = new FormData(formMess);
    xhr1.send(messageContent);
}

setInterval(()=>{
    const formMessing = document.querySelector("#send_message"),
    messBody = document.querySelector("#show-message-chat");

    let xhr3 = new XMLHttpRequest();
    xhr3.open("POST", "fetch_chat.php", true);
    xhr3.onload = ()=>{
        if(xhr3.readyState === XMLHttpRequest.DONE){
            if(xhr3.status === 200){

                let result = xhr3.response;
                messBody.innerHTML = result;
            }
        }
    }
    let selectData = new FormData(formMessing);
    xhr3.send(selectData);
}, 100);




// send image to your friends



function sendImageToChat(){
    const formImg = document.querySelector("#send_mess_photo"),
    inputFiled = formImg.querySelector("#update-profile"),
    sendFiled = formImg.querySelector("#update_profile");

    formImg.onsubmit = (t)=>{
        t.preventDefault();
    }

   document.querySelector(".hidelink").style.display = "none";
   let xhrFile = new XMLHttpRequest();
   xhrFile.open("POST", "insert_photo_js.php", true);
   xhrFile.onload = ()=>{
        if(xhrFile.readyState === XMLHttpRequest.DONE){
            if(xhrFile.status === 200){
                // console.log(xhrFile.response);
                inputFiled.value = "";
            }
        }
   }
   let photo = new FormData(formImg);
   xhrFile.send(photo);
}




function getChatPage(e){
    const inputValue = e;
    let showResult = document.querySelector("#showuploadImg");
    showResult.style.display = "block";
    let xhr4 = new XMLHttpRequest();
    xhr4.open("POST", ('index.php?id='+inputValue), true);
    xhr4.onload = ()=>{
        if(xhr4.readyState === XMLHttpRequest.DONE){
            if(xhr4.status === 200){
                // console.log(xhr4.response);
                showResult.innerHTML = xhr4.response;
            }
        }
    }
    xhr4.send();
}


// get new people using ajax 
setInterval(() =>{
    let xhr6 = new XMLHttpRequest();
    xhr6.open("POST", "select_new_people.php", true);
    xhr6.onload = ()=>{
        if(xhr6.readyState === XMLHttpRequest.DONE){
            if(xhr6.status === 200){

                let data = xhr6.response;
                document.querySelector("#show_new_people").innerHTML = data;
            }
        }
    }
    xhr6.send();
}, 600);