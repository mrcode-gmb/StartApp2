// start execute javaScript quesryuy
function open_new_tab(){
    document.getElementById("new_request_id").style.display = "block";
    document.getElementById("pendding_request_id").style.display = "none";
    document.getElementById("request_requested_id").style.display = "none";
}
function pendding_new_tab(){
    document.getElementById("new_request_id").style.display = "none";
    document.getElementById("pendding_request_id").style.display = "block";
    document.getElementById("request_requested_id").style.display = "none";
}
function request_new_tab(){
    document.getElementById("new_request_id").style.display = "none";
    document.getElementById("pendding_request_id").style.display = "none";
    document.getElementById("request_requested_id").style.display = "block";
}
// end execute javaScript quesryuy




var clickIted = document.querySelector(".display_friending");

setInterval(()=>{
    let xhr10 = new XMLHttpRequest();
    xhr10.open("POST", "display_friends.php", true);
    xhr10.onload = ()=>{
        if(xhr10.readyState === XMLHttpRequest.DONE){
            if(xhr10.status === 200){

                // console.log(xhr10.response);
                clickIted.innerHTML = xhr10.response;
            }
        }
    }

    xhr10.send();

}, 2000);


function send_id(id){
    const responsed = document.getElementById("displaySendRequest");
    let xhr30 = new XMLHttpRequest();
    xhr30.open("POST", "insert_friends_request.php?id="+id, true);
    xhr30.onload = ()=>{
        if(xhr30.readyState === XMLHttpRequest.DONE){
            if(xhr30.status === 200){

                // console.log("This is my id "+id);
                responsed.innerHTML = xhr30.response;
            }
        }
    }

    xhr30.send();
}

function delect_request(delect_id){
    let xhr8 = new XMLHttpRequest();
    xhr8.open("POST", "delete_friends_request.php?id="+delect_id, true);
    xhr8.onload = ()=>{
        if(xhr8.readyState === XMLHttpRequest.DONE){
            if(xhr8.status === 200){

                document.getElementById("displaySendRequest12").innerHTML = xhr8.response;
            }
        }
    }

    xhr8.send();
}



setInterval(()=>{
    let xhr7 = new XMLHttpRequest();
    xhr7.open("POST", "display_pendding_friends.php", true);
    xhr7.onload = ()=>{
        if(xhr7.readyState === XMLHttpRequest.DONE){
            if(xhr7.status === 200){

                // console.log(xhr7.response);
                document.querySelector(".pendding_request_id").innerHTML = xhr7.response;
            }
        }
    }

    xhr7.send();

}, 500);



setInterval(()=>{
    let xhr12 = new XMLHttpRequest();
    xhr12.open("POST", "accept_pendding_friends.php", true);
    xhr12.onload = ()=>{
        if(xhr12.readyState === XMLHttpRequest.DONE){
            if(xhr12.status === 200){

                // console.log(xhr12.response);
                document.querySelector(".request_requested_id").innerHTML = xhr12.response;
            }
        }
    }

    xhr12.send();

}, 500);


// when send friend request i delete it 

function delect_request_accept(delete_id_accept){
    // alert(delete_id_accept);
    let xhr14 = new XMLHttpRequest();
    xhr14.open("POST", "delete_send_request.php?delete_id="+delete_id_accept, true);
    xhr14.onload = ()=>{
        if(xhr14.readyState === XMLHttpRequest.DONE){
            if(xhr14.status === 200){

                console.log("This is my id ");
                // alert("This is my id "+xhr14.response);
            }
        }
    }

    xhr14.send();
}

function update_accept_request(update_request_id){
    // alert(delete_id_accept);
    let xhr15 = new XMLHttpRequest();
    xhr15.open("POST", "update_send_request.php?update_request_id="+update_request_id, true);
    xhr15.onload = ()=>{
        if(xhr15.readyState === XMLHttpRequest.DONE){
            if(xhr15.status === 200){

                console.log("welcom");
                // alert("This is my id "+xhr15.response);
            }
        }
    }

    xhr15.send();

}

// count pendding requested 

setInterval(()=>{
    let xhr20 = new XMLHttpRequest();
    xhr20.open("POST", "badge/pendding_badge_request.php", true);
    xhr20.onload = ()=>{
        if(xhr20.readyState === XMLHttpRequest.DONE){
            if(xhr20.status === 200){

                // console.log(xhr20.response);
                document.querySelector("#penddingBadgeRequest").innerHTML = xhr20.response;
            }
        }
    }

    xhr20.send();

}, 500);

// count waiting accept requested 


setInterval(()=>{
    let xhr19 = new XMLHttpRequest();
    xhr19.open("POST", "badge/waitting_badge_request.php", true);
    xhr19.onload = ()=>{
        if(xhr19.readyState === XMLHttpRequest.DONE){
            if(xhr19.status === 200){

                // console.log(xhr19.response);
                document.querySelector("#waittingBadgeRequest").innerHTML = xhr19.response;
            }
        }
    }

    xhr19.send();

}, 500);
