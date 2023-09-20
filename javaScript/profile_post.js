
const postDv = document.querySelector("#profile-posting");
const editdiv = document.querySelector("#profile-edit");

function openpostingprofile(){
    postDv.style.display = "block";
    editdiv.style.display = "none";
}


function openeditprofile(){
    postDv.style.display = "none";
    editdiv.style.display = "block";
}

