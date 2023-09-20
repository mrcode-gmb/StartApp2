const formdata = document.querySelector("#postingForm"),
textAreaContent = document.querySelector("#textArea"),
formFile = document.querySelector("#file"),
postBtn = formdata.querySelector("#pushingPost");
const displayAll = document.querySelector(".displyAllUsersPosting");
const singlePost = document.querySelector(".displyAllProfilesPosting");

formdata.onsubmit = (q)=>{
    q.preventDefault();
}

postBtn.onclick = ()=>{
    let newXhr = new XMLHttpRequest();
    newXhr.open("POST","posting/insert_new_posting.php", true);
    newXhr.onload = ()=>{
        if(newXhr.readyState === XMLHttpRequest.DONE){
            if(newXhr.status === 200){
                
                textAreaContent.value = "";
                formFile.value = "";
                document.querySelector('.modal').style.display = "none";
            }
        }
    }
    let newForm = new FormData(formdata);
    newXhr.send(newForm);
}


setInterval(()=>{

    let xhrVar = new XMLHttpRequest();
    xhrVar.open("POST", "posting/select_all_new_posting.php", true);
    xhrVar.onload =()=>{
        if(xhrVar.readyState === XMLHttpRequest.DONE){
            if(xhrVar.status === 200){
                displayAll.innerHTML = xhrVar.response;
            }
        }
    }
    xhrVar.send();

},400);


setInterval(()=>{

    let single = new XMLHttpRequest();
    single.open("POST", "posting/profile_all_new_posting.php", true);
    single.onload =()=>{
        if(single.readyState === XMLHttpRequest.DONE){
            if(single.status === 200){
                singlePost.innerHTML = single.response;
            }
        }
    }
    single.send();

},1000);

function likeId(likeId){
    let like = new XMLHttpRequest();
    like.open("POST", "posting/like/insert_all_new_posting.php?postingId="+likeId, true);
    like.onload =()=>{
        if(like.readyState === XMLHttpRequest.DONE){
            if(like.status === 200){

            }
        }
    }
    like.send();
}

function deleteOldLike(likeIding){
    let del = new XMLHttpRequest();
    del.open("POST", "posting/like/delete_new_posting_like.php?postingId="+likeIding, true);
    del.onload =()=>{
        if(del.readyState === XMLHttpRequest.DONE){
            if(del.status === 200){

            }
        }
    }
    del.send();
}

function openComment(eventId) {
    var openComment = document.querySelector(".d-hide");
    openComment.style.display = "block";

    let comment = new XMLHttpRequest();
    comment.open("POST", "posting/comment/displ_single_posting.php?postingId="+eventId, true);
    comment.onload =()=>{
        if(comment.readyState === XMLHttpRequest.DONE){
            if(comment.status === 200){
                document.getElementById("viewPosting").innerHTML = comment.response;
            }
        }
    }
    comment.send();
}

function closeChatNowToUser(){

    document.querySelector(".d-hide").style.display = "none";
}


// start comment script here 
function sendCommentId(){
    const commentForm = document.querySelector("#commentForm");
    let sendNew = new XMLHttpRequest();
    sendNew.open("POST", "posting/comment/insert_new_comment.php", true);
    sendNew.onload =()=>{
        if(sendNew.readyState === XMLHttpRequest.DONE){
            if(sendNew.status === 200){
                // alert(sendNew.response);
                document.getElementById("commentInput").value = "";
            }
        }
    }
    let sendNewId = new FormData(commentForm);
    sendNew.send(sendNewId);
}

setInterval(()=>{
    const commentForm = document.querySelector("#commentForm");
    const PostWithComment = document.querySelector("#getSinglePostWithComment");
    let fetchComment = new XMLHttpRequest();
    fetchComment.open("POST", "posting/comment/select_all_comment_withG.php", true);
    fetchComment.onload =()=>{
        if(fetchComment.readyState === XMLHttpRequest.DONE){
            if(fetchComment.status === 200){
                PostWithComment.innerHTML =  fetchComment.response;
            }
        }
    }
    let sendNewId = new FormData(commentForm);
    fetchComment.send(sendNewId);
},1000);



// unlike javaScript


function UnLikeIdlikeId(likeId){
    let like = new XMLHttpRequest();
    like.open("POST", "posting/unlike/insert_unlike.php?postingId="+likeId, true);
    like.onload =()=>{
        if(like.readyState === XMLHttpRequest.DONE){
            if(like.status === 200){
                // alert(like.response);
            }
        }
    }
    like.send();
}



function deleteOldUnLike(likeIding){
    let del = new XMLHttpRequest();
    del.open("POST", "posting/unlike/delete_posting_un_like.php?postingId="+likeIding, true);
    del.onload =()=>{
        if(del.readyState === XMLHttpRequest.DONE){
            if(del.status === 200){
                // alert(del.response);
            }
        }
    }
    del.send();
}
