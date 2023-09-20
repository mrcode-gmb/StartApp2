const groupForm = document.querySelector("#createGroupForm"),
inputfile       = groupForm.querySelector("#update-profiled"),
groupName       = groupForm.querySelector("#group-name"),
createGBtn      = groupForm.querySelector("#create_group_btn");
const groupmodal = document.querySelector("#show-a-new-groupt");

groupForm.onsubmit = (errorsed)=>{
    errorsed.preventDefault();
}

createGBtn.onclick = ()=>{

    let httpR = new XMLHttpRequest();
    httpR.open("POST", "groups/create_groups.php", true);
    httpR.onload = ()=>{
        if(httpR.readyState === XMLHttpRequest.DONE){
            if(httpR.status === 200){
                let groups = httpR.response;
                // console.log(groups);
                inputfile.value = "";
                groupName.value = "";
                groupmodal.style.display = "none";
            }
        }
    }
    
    let groupData = new FormData(groupForm);
    httpR.send(groupData);
}




setInterval(()=>{
    let httpD = new XMLHttpRequest();
    httpD.open("POST", "groups/display_groups_verified.php", true);
    httpD.onload = ()=>{
        if(httpD.readyState === XMLHttpRequest.DONE){
            if(httpD.status === 200){
                let resulted = httpD.response;
                document.querySelector(".displayAllGroups").innerHTML = resulted;
            }
        }
    }
    httpD.send();
}, 2000);

function verify_groups(groupId){
    
    let httpV = new XMLHttpRequest();
    httpV.open("POST", "groups/verified_groups.php?groupId="+groupId, true);
    httpV.onload = ()=>{
        if(httpV.readyState === XMLHttpRequest.DONE){
            if(httpV.status === 200){
                let resulted = httpV.response;
                document.getElementById("displMessages").innerHTML = resulted;
            }
        }
    }
    httpV.send();
}

// openGroupChat with ajax 

function openGroupChat(group_Id){
    
    // setInterval(()=>{
        let httpP = new XMLHttpRequest();
        httpP.open("POST", "groups/display_chat__group_place.php?group_Id="+group_Id, true);
        httpP.onload = ()=>{
            if(httpP.readyState === XMLHttpRequest.DONE){
                if(httpP.status === 200){
                    let resulted = httpP.response;
                    // alert(resulted);
                    document.querySelector("#showGropChat").innerHTML = resulted;
                    document.querySelector("#showGropChat").style.display = "block";
                }
            }
        }
        httpP.send();
    // },400);
}



// send group chat using ajx 


// groupBtnSender    = groupFormed.querySelector("#groupBtnSender");

function groupBtnSender(){

    const groupFormed = document.querySelector("#send_group_message");
    const inputText = document.querySelector("#input-value");

    groupFormed.onsubmit = (z)=>{
        z.preventDefault();
    }

    let sendes = new XMLHttpRequest();
    sendes.open("POST", "groups/create_new_group_messages.php", true);
    sendes.onload =()=>{
        if(sendes.readyState === XMLHttpRequest.DONE){
            if(sendes.status === 200){
                // alert(sendes.response);
                inputText.value = "";
            }
        }
    }
    let datas = new FormData(groupFormed);
    sendes.send(datas);
}



setInterval(()=>{
    const groupFormeding = document.querySelector("#send_group_message");

    groupFormeding.onsubmit = (t)=>{
        s.preventDefault();
    }

    let fetching = new XMLHttpRequest();
    fetching.open("POST", "groups/fetch_new_group_messages.php", true);
    fetching.onload =()=>{
        if(fetching.readyState === XMLHttpRequest.DONE){
            if(fetching.status === 200){
                document.getElementById("show-group-message").innerHTML = fetching.response;
            }
        }
    }
    let fetchings = new FormData(groupFormeding);
    fetching.send(fetchings);
    
}, 100);

function closeGroupChatNowToUser(){
    document.getElementById("groupChatHide").style.display = "none";
}


function openUploadPicToGroup(){

}

function openUploadPicToGroup(){
    document.querySelector("#hidelink").style.display = "block";
}
function closeUpdatePicToGroup(){
    document.querySelector("#hidelink").style.display = "none";

}


var showImageUpload = function (event){
    document.getElementById("showSendToImg").style.display = "block";
    var imgimg = document.getElementById("sendGroupImg");
    imgimg.src = URL.createObjectURL(event.target.files[0]);
    // ImgDivd;
};
var showImageUpload = function (event){
    var showSendToImg = document.getElementById("showSendToImg");
    var img = document.getElementById("sendGroupImg");
    img.src = URL.createObjectURL(event.target.files[0]);
    showSendToImg.style.display = "block";
};


function deleteImages(){
    var showDiv = document.getElementById("showSendToImg");
    var empty = document.getElementById("sendGroupImg");
    // var files = document.getElementById("file");
    empty.src = "";
    showDiv.style.display = "none";
    empty.value = "";
}



// send image to your friends



function sendGroupImgToChat(){

    const formImgGroup = document.querySelector("#send_group_photo"),
    inputFileding = formImgGroup.querySelector("#update-profile");
    var empty = document.getElementById("sendGroupImg");
    formImgGroup.onsubmit = (tq)=>{
        tq.preventDefault();
    }

   document.querySelector("#hidelink").style.display = "none";
   let xhrFiling = new XMLHttpRequest();
   xhrFiling.open("POST","groups/insert_group_photo_js.php",true);
   xhrFiling.onload = ()=>{
        if(xhrFiling.readyState === XMLHttpRequest.DONE){
            if(xhrFiling.status === 200){
                inputFileding.value = "";
                empty.value = "";                
                // alert(xhrFiling.response);
            }
        }
   }
   let datting = new FormData(formImgGroup);
   xhrFiling.send(datting);
}


// start javaScript to joining new group 

function openJoinGroup(){
    document.getElementById("display-new-group").style.display = "block";
}

function closeTheJoinGroup(){

    document.getElementById("display-new-group").style.display = "none";
}

function openSearchBar(){
    const searchDiv = document.querySelector(".join-search");
    searchDiv.style.display = "block";
    document.getElementById("join-search").style.display = "none";
    document.getElementById("closeSearchBar").style.display = "block";
}

function closeSearchBar(){
    const searchDiv = document.querySelector(".join-search");
    searchDiv.style.display = "none";
    document.getElementById("join-search").style.display = "block";
    document.getElementById("closeSearchBar").style.display = "none";
}

// send request to get a other groups to joining it

setInterval(()=>{

   const displayGroups = document.querySelector("#displOtherGroups");

   let xhrDisplay = new XMLHttpRequest();
   xhrDisplay.open("POST","groups/disply_joining_groups.php",true);
   xhrDisplay.onload = ()=>{
        if(xhrDisplay.readyState === XMLHttpRequest.DONE){
            if(xhrDisplay.status === 200){            
                // alert(xhrDisplay.response);
                displayGroups.innerHTML = xhrDisplay.response;
            }
        }
   }
   xhrDisplay.send();


},2000);



// insertNewGroupRequest

function insertNewGroupRequest(groupIdInsert){
    // alert(groupIdInsert);
   let xhrInsert = new XMLHttpRequest();
   xhrInsert.open("POST","groups/insert_joining_groups.php?ided="+groupIdInsert,true);
   xhrInsert.onload = ()=>{
        if(xhrInsert.readyState === XMLHttpRequest.DONE){
            if(xhrInsert.status === 200){            
                // alert(xhrInsert.response);
                document.getElementById("displayJoiningGroups").innerHTML = xhrInsert.response;
            }
        }
   }
   xhrInsert.send();
}

// open group down using javaScript function 

function openGroupDrop(){
    document.getElementById("openGroupDrop").style.display = "none";
    document.getElementById("closeGroupDrop").style.display = "block";
    document.getElementById("group_drop").style.display = "block";
    
}


function closeGroupDrop(){
    document.getElementById("openGroupDrop").style.display = "block";
    document.getElementById("closeGroupDrop").style.display = "none";
    document.getElementById("group_drop").style.display = "none";
    
}

// open add people to group page 

function addNewPeoplPage(){
    document.getElementById("display-add-newpeopl-group").style.display = "block";
}
function closeAddNewJoinGroup() {
    document.getElementById("display-add-newpeopl-group").style.display = "none";
    
}

// search new friend to add him


function openSearchBarToAddPeople(){
    const searchDiv = document.querySelector(".openAddNewFrineds");
    searchDiv.style.display = "none";
    document.querySelector(".closeAddNewFrineds").style.display = "block";
    document.getElementById("searchNewFriends").style.display = "block";
}

function closeSearchBarToAddPeople(){
    const searchDiv = document.querySelector(".openAddNewFrineds");
    searchDiv.style.display = "block";
    document.querySelector(".closeAddNewFrineds").style.display = "none";
    document.getElementById("searchNewFriends").style.display = "none";
}

setInterval(()=>{
    
},100);


setInterval(()=>{

    const displayPeoples = document.querySelector("#displOtherGrouping");
    const formId = document.querySelector("#formId");
    let xhrDisplayFriends = new XMLHttpRequest();
    xhrDisplayFriends.open("POST","groups/disply_people_to_add_groups.php",true);
    xhrDisplayFriends.onload = ()=>{
         if(xhrDisplayFriends.readyState === XMLHttpRequest.DONE){
             if(xhrDisplayFriends.status === 200){            
                 // alert(xhrDisplayFriends.response);
                 displayPeoples.innerHTML = xhrDisplayFriends.response;
             }
         }
    }
    let datas = new FormData(formId)
    xhrDisplayFriends.send(datas);
 
 
 },1000);


 function addNewPeopleToGroup(ided){
    const formData = document.querySelector("#formData");
    let xhrDispla = new XMLHttpRequest();
    xhrDispla.open("POST","groups/insert_people_to_add_groups.php?id="+ided,true);
    xhrDispla.onload = ()=>{
         if(xhrDispla.readyState === XMLHttpRequest.DONE){
             if(xhrDispla.status === 200){            
                //  alert(xhrDispla.response);
                 document.getElementById("displMessage2").innerHTML = xhrDispla.response;
             }
         }
    }
    let datas = new FormData(formData)
    xhrDispla.send(datas);
 }
