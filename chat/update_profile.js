// show image 

var updateimage = function (event){
    var updateDiv = document.getElementById("show-profile");
    var img = document.getElementById("updateProfile");
    img.src = URL.createObjectURL(event.target.files[0]);
    updateDiv.style.display = "block";
};

// close img div 

function closeImgUpdate(){
    var showDiv = document.getElementById("show-profile");
    var empty = document.getElementById("update-profile");
    // var files = document.getElementById("file");

    showDiv.style.display = "none";
    empty.value = "";
}
function openUploadPic(){
    document.querySelector(".hidelink").style.display = "block";
}
function closeUpdatePic(){
    document.querySelector(".hidelink").style.display = "none";

}




// open group modal

// close img div 


var updateimaged = function (event){
    var updateDivd = document.getElementById("show-profiled");
    var imgd = document.getElementById("updateProfiled");
    imgd.src = URL.createObjectURL(event.target.files[0]);
    updateDivd.style.display = "block";
};

function openGroupModal(){
    document.querySelector("#show-a-new-groupt").style.display = "block";
}
function closegroupModal(){
    document.querySelector("#show-a-new-groupt").style.display = "none";

}

function closeImhs(){
    var showDiv = document.getElementById("show-profiled");
    var empty = document.getElementById("update-profiled");
    // var files = document.getElementById("file");

    showDiv.style.display = "none";
    empty.value = "";
}


function close_alert(){
    document.querySelector("#singleAlert").style.display = "none";
}
function close_true(){
    document.querySelector("#sweet-alert").style.display = "none";

}