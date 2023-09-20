function openModalPost(){
    document.querySelector(".modal").style.display = "block";
}
function closeModal(){
    document.querySelector(".modal").style.display = "none";

}


// notification 
function openNotification(){
    var notification = document.getElementById("notification");

    // if(notification.style.display == "none"){
        notification.style.display = "block";
    // }
    // else{
    //      notification.style.display = "none";
    // }
}

function closeNotification(){
    notification = document.getElementById("notification").style.display = "none";
}



// show image 

var showimage = function (event){
    var showDiv = document.getElementById("showDiv");
    var img = document.getElementById("showImages");
    img.src = URL.createObjectURL(event.target.files[0]);
    showDiv.style.display = "block";
};

// close img div 

function closeImgDiv(){
    var showDiv = document.getElementById("showDiv");
    var files = document.getElementById("file");

    showDiv.style.display = "none";
    files.value = "";
}