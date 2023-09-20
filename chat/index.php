<?php

    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");
    $newObj = new createUsers();

    if(isset($_GET['id'])){
       $id = $_GET['id'];

       $rowUpdateMessage = $newObj->update_new_box_message($_SESSION['id'],$id);
       $select2 = $newObj->select_single_chat($id);
       $fetch = $select2->fetch();
    }
?>
<!-- send images for message  -->
<form  enctype="multipart/form-data" id="send_mess_photo">
    <div class="hidelink">
        <div class="uploaded">
            <div class="upload-pic">
                <div class="upload-header">
                    <h4>Share Photos</h4>
                    <i class="fa fa-times" onclick="closeUpdatePic()"></i>
                </div>
                <div class="upload-body">
                    <label for="update-profile">
                        <h4 onchange="updateimage(event)"><i class="fa fa-plus"></i> Choose Photo</h4></h4>
                    </label>
                    <input type="text" style="display: bl;" name="request_id_file" value="<?php echo $fetch['id']?>">
                    <input type="hidden" name="sender_id_file" value="<?php echo $_SESSION['id']?>">
                    <input type="file" name="photo_sender" id="update-profile" accept="image/*" onchange="updateimage(event)">
                </div>
                <div class="show-profile" id="show-profile">
                    <img  id="updateProfile" alt="">
                    <i class="fa fa-times" onclick="closeImgUpdate()"></i>
                </div>
                <div class="update-pic-button">
                    <button type="button" onclick="sendImageToChat()" name="photo">Send <i class="fa fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="chat-home-get">
     <div class="col-md-6">
        <div class="container">
            <div class="chat-head" id="home-fixed">
                <div class="name">
                    <?php
                        if($fetch['active_status'] == "Online"){
                            echo '<span class="span-green"></span>';
                        }
                        else{

                        }
                    
                    ?>
                    <i class="fa fa-arrow-left" onclick="closeChatNowToUsersss()"></i>
                    <?php
                    
                        if($fetch['profile_pic'] == ""){
                            echo '<img src="../asset/img/profile.jpg" alt="">';
                        }
                        else{
                            echo '<img src="../userpicture/'.$fetch['profile_pic'].'" alt="">';
                        }
                    
                    ?>
                    <div class="user">
                        <h4><?php echo $fetch['first_name'];?></h4>
                        <p><?php echo $fetch['active_status'];?></p>
                    </div>
                </div>
                <div class="icon">
                    <i class="fa fa-cog" id="openPrivateDrop" onclick="openPrivateDrop()"></i>
                    <i class="fa fa-cog" id="closePrivateDrop" onclick="closePrivateDrop()"></i>
                    <div class="group-drop" id="private_drop">
                        <li>
                            <a href="#">View profile</a>
                        </li>
                        <li>
                            <a href="#" onclick="clearprivatechat('<?php echo $id;?>')">Clear chat</a>
                        </li>
                        <li>
                            <a href="#">Report</a>
                        </li>
                        <li>
                            <a href="#">Block</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="chat-body" id="home-fixed-body">
                <div class="display-main">
                    <p><i class="fa fa-quote-left"></i> We are highly welcome to our group, Mr <?php echo $_SESSION['firstName'];?> We are highly welcome to our group, Mr <?php echo $_SESSION['firstName'];?> <i class="fa fa-quote-right"></i></p>
                </div>
                <div class="message" id="show-message-chat">
                    <!-- show convasation here using ajax -->
                </div>
            </div>
            <form  id="send_message">
                <div class="mess-for" id="home-fixed">
                    <div class="camera">
                        <i class="bi bi-camera" onclick="openUploadPic()"></i>
                    </div>
                    <div class="input">
                        <input type="hidden" name="request_id" value="<?php echo $fetch['id']?>">
                        <input type="hidden" name="sender_id" value="<?php echo $_SESSION['id']?>">
                        <input type="text" name="contents" id="input-message" placeholder="message.....">
                        <i class="fa fa-grin"></i>
                    </div>
                    <div class="send">
                        <i class="fa fa-paper-plane"  onclick="sendBtn()"></i>
                    </div>
                </div>
            </form>
        </div>
    </div>   
</div>
<script src="request.js"></script>