function openLikeNoted(){
    document.querySelector(".liking-noted").style.display = "block";
    document.querySelector(".comment-noted").style.display = "none";
    document.querySelector(".disliking-noted").style.display = "none";
}

function openCommentNoted(){
    document.querySelector(".liking-noted").style.display = "none";
    document.querySelector(".comment-noted").style.display = "block";
    document.querySelector(".disliking-noted").style.display = "none";

    let newXhr = new XMLHttpRequest();
    
    newXhr.open("POST", "notification/comment_view.php", true);
    newXhr.onload = ()=>{
        if(newXhr.readyState === XMLHttpRequest.DONE && newXhr.status === 200){
            // document.getElementById("shownumberofcomment").innerHTML = ;
            // alert(newXhr.response
        }
    }
    newXhr.send();

}

function openDisLikeNoted(){
    document.querySelector(".liking-noted").style.display = "none";
    document.querySelector(".comment-noted").style.display = "none";
    document.querySelector(".disliking-noted").style.display = "block";

}




setInterval(()=>{

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "badge/comment_noted.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            document.getElementById("shownumberofcomment").innerHTML = xhr.response;
        }
    }
    xhr.send();

},300);


setInterval(()=>{

    let httpr = new XMLHttpRequest();
    httpr.open("POST", "notification/comment_view_list.php", true);
    httpr.onload = ()=>{
        if(httpr.readyState === XMLHttpRequest.DONE && httpr.status === 200){
            document.getElementById("comment-noted").innerHTML = httpr.response;
            // alert(httpr.response);
        }
    }
    httpr.send();

},300);