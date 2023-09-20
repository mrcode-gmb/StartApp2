// function playReals() {
//     document.getElementById("playRealsV").play();
//     document.getElementById("play-btn").style.display = "none";
//     document.getElementById("pause-btn").style.display = "block";
//  }
//  function pauseReals() {
//     document.getElementById("playRealsV").pause();
//     document.getElementById("pause-btn").style.display = "none";
//     document.getElementById("play-btn").style.display = "block";
//  }

function closePostingImg(){
   document.getElementById("display-full").style.display = 'none';
}

 function displayFullScreen(poasngurl){
   document.getElementById("display-full").style.display = 'block';
    let fullImg = new XMLHttpRequest();
    fullImg.open("POST", "posting/full_screen_posting.php?imgurl="+poasngurl, true);
    fullImg.onload =()=>{
        if(fullImg.readyState === XMLHttpRequest.DONE){
            if(fullImg.status === 200){
                document.getElementById("display-full").innerHTML = fullImg.response;
            }
        }
    }
    fullImg.send();
 }