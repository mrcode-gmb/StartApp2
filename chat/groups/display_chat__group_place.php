<?php
    include_once ("../session_destry.php");
    include_once ("../../controller/groupController.php");

    $objGroup = new groupController();

    $id = $_GET['group_Id'];
    $peopleId = $_SESSION['id'];
    $results = "";
    $selectPublic = $objGroup->selectGroupChat($id);

    $CountPublic = $objGroup->selectCountGroupUsers($id);
    
    if($counter = $CountPublic->rowCount()){
        $results = $counter;
    }

    $fetchDate = $selectPublic->fetch();


?>
<div id="display-add-newpeopl-group">
    <div class="join-new-group">
        <div class="bg-white">
            <div class="join-header">
                <div class="join-tab">
                    <h4><i class="fa fa-users"></i> Add new people</h4>
                </div>
                <div class="join-close">
                    <i class="fa fa-search openAddNewFrineds" id="join-search" onclick="openSearchBarToAddPeople()"></i>
                    <i class="fa fa-search closeAddNewFrineds" id="closeSearchBar" onclick="closeSearchBarToAddPeople()"></i>
                    <i class="fa fa-times" onclick="closeAddNewJoinGroup()"></i>
                </div>
            </div>
            <div class="join-body">
                <div class="join-search" id="searchNewFriends">
                    <input type="search" placeholder="search">
                </div>
                <form method="post" id="formId">
                    <input type="hidden" name="inputId" value="<?php echo $id;?>">
                </form>
                <div id="displMessage2" style="margin-top: 11px;">
    
                </div>
                <div id="displOtherGrouping">
                    <!-- <div class="join-content" style="padding: 10px; background: white;">
                        <div class="joint-c-left">
                            <img src="groups/groupslogos/user3-128x128.jpg" style="border-radius: 50%;">
                            <div class="join-name">
                                <h4>Heart Name</h4>
                                <span>@heartname</span>
                            </div>
                        </div>
                        <div class="joint-c-left">
                            <button>Add</button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- send images for message  -->
<form  enctype="multipart/form-data" id="send_group_photo">
    <div class="hidelink" id="hidelink">
        <div class="uploaded">
            <div class="upload-pic">
                <div class="upload-header">
                    <h4>Share Photos</h4>
                    <i class="fa fa-times" onclick="closeUpdatePicToGroup()"></i>
                </div>
                <div class="upload-body">
                    <label for="ShowImageForGroup">
                        <h4 onchange="showImageUpload(event)"><i class="fa fa-plus"></i> Choose Photo</h4></h4>
                    </label>
                    <input type="hidden" name="group_id_file" value="<?php echo $fetchDate['group_id'];?>">
                    <input type="hidden" name="senderIdFile" value="<?php echo $_SESSION['id']?>">
                    <input type="file" name="photoLink" id="ShowImageForGroup" accept="image/*" onchange="showImageUpload(event)">
                </div>
                <div class="show-profile" id="showSendToImg">
                    <img  id="sendGroupImg">
                    <i class="fa fa-times" onclick="deleteImages()"></i>
                </div>
                <div class="update-pic-button">
                    <button type="button" onclick="sendGroupImgToChat()" name="photo">Send <i class="fa fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="chat-home-get" id="groupChatHide">
 <div class="col-md-6">
    <div class="container">
        <div class="chat-head" id="home-fixed">
            <div class="name">
                <!-- <span class="fa fa-users span-green"></span> -->
                <i class="fa fa-arrow-left" onclick="closeGroupChatNowToUser()"></i>
                <?php
                
                    if($fetchDate['group_logo'] == ""){
                        echo '<img src="../asset/img/profile.jpg" alt="">';
                    }
                    else{
                        echo '<img src="groups/groupslogos/'.$fetchDate['group_logo'].'" alt="">';
                    }
                
                ?>
                <div class="user">
                    <h4><?php echo $fetchDate['group_named'];?></h4>
                    <p><?php echo $results;?> particepant</p>
                </div>
            </div>
            <div class="icon">
                <i class="fa fa-cog" id="openGroupDrop" onclick="openGroupDrop()"></i>
                <i class="fa fa-cog" id="closeGroupDrop" onclick="closeGroupDrop()"></i>
                <div class="group-drop" id="group_drop">
                    <li>
                        <a href="#">Peoples</a>
                    </li>
                    <li>
                        <a href="#">About Group</a>
                    </li>
                    <li>
                        <a href="#" onclick="addNewPeoplPage()">Invite Friend</a>
                    </li>
                    <li>
                        <a href="#">Exit Group</a>
                    </li>
                </div>
            </div>
        </div>
        <div class="chat-body" id="home-fixed-body">
            <div class="display-main">
                <p><i class="fa fa-quote-left"></i> We are highly welcome to our group, Mr <?php echo $_SESSION['firstName'];?> We are highly welcome to our group, Mr <?php echo $_SESSION['firstName'];?> <i class="fa fa-quote-right"></i></p>
            </div>
            <div class="message" id="show-group-message">
                <!-- show convasation here using ajax -->
            </div>
        </div>
        <form  id="send_group_message">
            <div class="mess-for" id="home-fixed">
                <div class="camera">
                    <i class="bi bi-camera" onclick="openUploadPicToGroup()"></i>
                </div>
                <div class="input">
                    <input type="hidden" name="group_id" value="<?php echo $fetchDate['group_id']?>">
                    <input type="hidden" name="sender_id" value="<?php echo $_SESSION['id']?>">
                    <input type="text" name="message" id="input-value" placeholder="message.....">
                    <i class="fa fa-grin"></i>
                </div>
                <div class="send">
                    <i class="fa fa-paper-plane" onclick="groupBtnSender()"></i>
                </div>
            </div>
        </form>
    </div>
</div>   
</div>
<script src="../../javaScript/group_request.js"></script>