
<?php

include_once ("session_destry.php");
include_once ("../controller/user_crud.php");
include_once ("../controller/NotificationController.php");
$newObj = new createUsers();
$note   = new NotificationController();

if(isset($_GET['id'])){
   $id = $_GET['id'];

   $select2 = $newObj->select_single_chat($id);
   $fetch = $select2->fetch();
}
$id = $_SESSION['id'];
if (isset($id)) {
    $update = $newObj->userOnline($id);
}

$noted = $note->getCommentNote();
$like = $note->GetLikeNoted();
// $rowGet = $noted->fetch();
// print_r ($rowGet);
$result = "";
if($noted->rowCount()>0 || $like->rowCount()>0){
    $result = '<p href="" class="bell-radius"></p>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../asset/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../asset/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="modal.css">
    <link rel="stylesheet" href="user_profile.css">
    <style>
		.mode {
			float:right;
            position: fixed;
            z-index: 5000000;
		}
		.change {
			cursor: pointer;
			border: 1px solid #555;
			border-radius: 40%;
			width: 20px;
			text-align: center;
			padding: 5px;
			margin-left: 8px;
		}
		.dark{
			background: #222;
			color: #e6e6e6;
            box-shadow: 0 0 0px 0;
		}
        .text-white-dark{
            color: white;
        }
        .text-white-p{
            color: white;
        }
	</style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
    <!-- <div class="mode">
		Dark mode:			
		<span class="change">OFF</span>
	</div> -->
    <div id="display-full">
        <!-- view images with full screen -->
    </div>

    <div class="modal">
        <div class="model-content">
            <div class="modal-dialog">
                <div class="modal-header">
                    <div class="modal-name">
                        <h4>Create Post</h4>
                    </div>
                    <div class="modal-close">
                        <i class="fa fa-times" onclick="closeModal()"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="" id="postingForm">
                        <div class="post-group">
                            <textarea name="postingContent" id="textArea"></textarea>
                        </div>
                        <div class="post-group">
                            <input type="file" accept="image/*" name="postFile" class="form-control-post" id="file" onchange="showimage(event)">
                        </div>
                        <div class="modal-post-img">
                            <div class="img-modal" id="showDiv">
                                <img  id="showImages">
                                <i class="fa fa-times" onclick="closeImgDiv()"></i>
                            </div>
                        </div>
                        <input type="hidden" name="poster_id" value="<?php echo $_SESSION['id'];?>">
                        <div class="modal-footer">
                            <button type="button"  id="pushingPost">Push</button>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
    <!-- view posting here  -->
    <div class="d-hide">
        <div id="viewPosting">
            
        </div>
    </div>
    <!-- view private here  -->
    <div id="showuploadImg">

    </div>

    <!-- view groupchat here  -->
    <div id="showGropChat">
    </div>
    <!-- find or create a new group -->
    <div id="show-a-new-groupt">
        <form  method="post" style="width: 100%; display: flex;" enctype="multipart/form-data" id="createGroupForm">
            <div class="group">
                <div class="uploaded">
                    <div class="upload-pic">
                        <div class="upload-header">
                            <h4>Create new group</h4>
                            <i class="fa fa-times" onclick="closegroupModal()"></i>
                        </div>
                        <div class="upload-title">
                            <div class="user-profile-group">
                                <?php
                                    if($_SESSION['profile_pic'] == ""){
                                        echo '<img src="../asset/img/profile.jpg" alt="">';
                                    }
                                    else{
                                        echo '<img src="../userpicture/'.$_SESSION['profile_pic'].'" alt="">';
                                    }

                                ?>
                            </div>
                            <input type="text" name="group_name" id="group-name" placeholder="Create group name">
                        </div>
                        <div class="upload-body-group">
                            <label for="update-profiled">
                                <i class="bi bi-camera-fill" onchange="updateimaged(event)"></i>
                            </label>
                            <input type="file" id="update-profiled" accept="image/*" name="group_logo" onchange="updateimaged(event)">
                        </div>
                        <div class="show-profile" id="show-profiled">
                            <img  id="updateProfiled" alt="">
                            <i class="fa fa-times" onclick="closeImhs()"></i>
                        </div>
                        <div class="update-pic-button-group">
                            <button type="button" id="update_profile" name="update_profile" class="btn-none" onclick="openJoinGroup()"><a href="#">Join new group</a></button>
                            <button type="button" id="create_group_btn" name="update_profile">Create group <i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form> 
    </div>
    
    <div id="display-new-group">
        <div class="join-new-group">
            <div class="bg-white">
                <div class="join-header">
                    <div class="join-tab">
                        <h4><i class="fa fa-users"></i> find new group</h4>
                    </div>
                    <div class="join-close">
                        <i class="fa fa-search" id="join-search" onclick="openSearchBar()"></i>
                        <i class="fa fa-search" id="closeSearchBar" onclick="closeSearchBar()"></i>
                        <i class="fa fa-times" onclick="closeTheJoinGroup()"></i>
                    </div>
                </div>
                <div class="join-body">
                    <div class="join-search">
                        <input type="search" placeholder="search">
                    </div>
                    <div id="displOtherGroups">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- find or create a new group -->

    <div class="main">   
        <!-- start header of my website       -->
        <div class="headers">
            <div class="heads">
                <div class="logo-name">
                    <div class="title">
                        <h3>L</h3>
                        <h4>StartApp</h4>
                    </div>
                    <div class="menu-db">
                        <i class="fa fa-bars" id="time-open" onclick="mobileToggleProfileBtn()"></i>
                    </div>
                </div>
                <div class="links-of">
                    <path href="#">
                        <i class="fa fa-home" id="comment-system"></i>
                        <i class="bi bi-people" style="font-size: 22px;" id="comment-mobile" onclick="openPeople()"></i>
                        <p href="" class="bell">2</p>
                    </path>
                    <path href="#">
                        <i class="bi bi-people" style="font-size: 22px;" id="comment-system"></i>
                        <i class="bi bi-chat" id="comment-mobile" onclick="openMessage()"></i>
                    </path>
                    <path href="#">
                        <i class="bi bi-chat" id="comment-system"></i>
                        <i class="fa fa-home" id="comment-mobile" onclick="openHomePage()"></i>
                        <!-- <p href="" class="bell">9</p> -->
                    </path>
                    <path>
                        <span class="fa  fa-regular fa-bell" style="font-size: 19px;" onclick="openNotification()"></span>
                        <!-- <p href="" class="bell">6</p> -->
                        <?php echo $result;?>
                    </path>
                    <path href="#">
                        <a href="reals_videos.php" ><i class="bx bx-video" style="font-size: 24px; transform: rotate(180deg);"></i></a>
                    </path>
                    <path href="#" onclick="toggleProfileBtn()" id="user_pro">
                        <img src="../asset/img/user3-128x128.jpg" alt="">
                    </path>
                    <div class="drop-pro" id="drop-pro">
                        <div class="header-drop">
                            <div class="drop-left">
                                <h3>Hi Abubakar</h3>
                            </div>
                            <div class="drop-right">
                                <button onclick="mobileToggleProfileBtnDt()" type="button">close</button>
                            </div>
                        </div>
                        <?php 
                            
                            // if(isset($_SESSION['profile_pic'])){
                            if($_SESSION['profile_pic'] == ""){
                                echo '<img src="../asset/img/profile.jpg" alt="">';
                            }
                            else{
                                echo '<img src="../userpicture/'.$_SESSION['profile_pic'].'" alt="">';
                            }
                        ?>
                        <div class="name-pro">
                        <h4><?php echo $_SESSION['firstName']; echo " "; echo $_SESSION['lastName'];?></h4>
                            <p>@<?php echo $_SESSION['username'];?></p>
                        </div>
                        <div class="pro-link">
                            <div class="pro-linked">
                                <div class="col-warrap">
                                    <a href="user_profile.php">
                                        <i class="fa fa-user"></i>
                                        <span>my account</span>
                                    </a>
                                    <a href="#" onclick="openModalPost()">
                                        <i class="fa fa-image"></i>
                                        <span>create post</span>
                                    </a>
                                </div>
                                <div class="col-warrap">
                                    <a href="user_profile.php">
                                        <i class="fa fa-user-plus"></i>
                                        <span>edit account</span>
                                        <a href="">
                                            <i class="fa fa-cog"></i>
                                            <span>setting</span>
                                        </a>
                                    </a>
                                </div>                                
                                <div class="col-warrap">
                                    <a href="logout.php" class="col-warrap-a">
                                        <i class="fa fa-sign-out-alt"></i>
                                        <span>logout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- start notification here  -->

        <div id="notification">
            <div class="not-head">
                <div class="not-tabs">
                    <h4>Notifications</h4>
                    <div class="close-not">
                        <i class="fa fa-times" onclick="closeNotification()"></i>
                    </div>
                </div>
                <div class="not-search">
                    <input type="text" placeholder="Search">
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <div class="link">
                <div class="all-0" style="width:75%;">
                    <div class="link-requested">
                        <a href="#!" onclick="openLikeNoted()">Like</i></a>
                        <div class="span-pendding"id="shownumberoflike">
                            <!-- show all notification about like  -->
                        </div>
                    </div>
                    <div class="link-requested">
                        <a href="#!" onclick="openCommentNoted()">Comment</a>
                        <div class="span-pendding" id="shownumberofcomment">
                            <!-- show all notification about comment  -->
                        </div>
                    </div>
                    <div class="link-requested">
                        <a href="#!" onclick="openDisLikeNoted()">Dislike</a>
                        <div class="span-pendding">
                            <div class="noted_like" id="noted_like">
                                <!-- show list of pedding request here  -->
                            +9
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="not-body">
                <!-- liking notifications -->
                <div class="liking-noted" id="like-views">
                    <!-- show like notifications -->
                </div>

                <!-- comment Notifications -->
                <div class="comment-noted" id="comment-noted">
                    <!-- show comment notifications -->
                </div>

                <!-- liking notifications -->
                <div class="disliking-noted">
                    <div class="not-block">
                        <div class="not-user">
                            <img src="../asset/img/user3-128x128.jpg" alt="">
                            <div class="not-user-name">
                                <h4>Merry Jonh</h4>
                                <p>Dislike your post ...</p>
                                <span>6h ago</span>
                            </div>
                        </div>
                        <div class="not-toggle">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                    <div class="not-block">
                        <div class="not-user">
                            <img src="../asset/img/user6-128x128.jpg" alt="">
                            <div class="not-user-name">
                                <h4>Salisu Umar</h4>
                                <p>like on your post ...</p>
                                <span>7d ago</span>
                            </div>
                        </div>
                        <div class="not-toggle">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                    <div class="not-block">
                        <div class="not-user">
                            <img src="../asset/img/user3-128x128.jpg" alt="">
                            <div class="not-user-name">
                                <h4>Merry Jonh</h4>
                                <p>like on your post ...</p>
                                <span>6h ago</span>
                            </div>
                        </div>
                        <div class="not-toggle">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                    <div class="not-block">
                        <div class="not-user">
                            <img src="../asset/img/user6-128x128.jpg" alt="">
                            <div class="not-user-name">
                                <h4>Salisu Umar</h4>
                                <p>like on your post ...</p>
                                <span>7d ago</span>
                            </div>
                        </div>
                        <div class="not-toggle">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                    <div class="not-block">
                        <div class="not-user">
                            <img src="../asset/img/user3-128x128.jpg" alt="">
                            <div class="not-user-name">
                                <h4>Merry Jonh</h4>
                                <p>like on your post ...</p>
                                <span>6h ago</span>
                            </div>
                        </div>
                        <div class="not-toggle">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                    <div class="not-block">
                        <div class="not-user">
                            <img src="../asset/img/user6-128x128.jpg" alt="">
                            <div class="not-user-name">
                                <h4>Salisu Umar</h4>
                                <p>like on your post ...</p>
                                <span>7d ago</span>
                            </div>
                        </div>
                        <div class="not-toggle">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                    <div class="not-block">
                        <div class="not-user">
                            <img src="../asset/img/user3-128x128.jpg" alt="">
                            <div class="not-user-name">
                                <h4>Merry Jonh</h4>
                                <p>like on your post ...</p>
                                <span>6h ago</span>
                            </div>
                        </div>
                        <div class="not-toggle">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                    <div class="not-block">
                        <div class="not-user">
                            <img src="../asset/img/user6-128x128.jpg" alt="">
                            <div class="not-user-name">
                                <h4>Salisu Umar</h4>
                                <p>like on your post ...</p>
                                <span>7d ago</span>
                            </div>
                        </div>
                        <div class="not-toggle">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                    <div class="not-block">
                        <div class="not-user">
                            <img src="../asset/img/user3-128x128.jpg" alt="">
                            <div class="not-user-name">
                                <h4>Merry Jonh</h4>
                                <p>like on your post ...</p>
                                <span>6h ago</span>
                            </div>
                        </div>
                        <div class="not-toggle">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                    <div class="not-block">
                        <div class="not-user">
                            <img src="../asset/img/user7-128x128.jpg" alt="">
                            <div class="not-user-name">
                                <h4>Salisu Umar</h4>
                                <p>like on your post ...</p>
                                <span>7d ago</span>
                            </div>
                        </div>
                        <div class="not-toggle">
                            <i class="bi bi-trash"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- start notification here  -->
        <!-- end header of my website       -->
        <div class="row">
            <div class="col-md-3" id="chatandgroup">
                <div class="chat">
                    <div class="chat-name">
                        <h4>Chat</h4>
                    </div>
                    <div class="chat-logo">
                        <i class="fa fa-apple-alt"></i>
                    </div>
                </div>
                <div class="link">
                    <div class="all-0">
                        <div class="chat-sl" onclick="chatSl()">
                            <a href="#">Chat</a>                        
                        </div>
                        <div class="chat-gr" onclick="chatGl()">
                            <a href="#">Group</a>                        
                        </div>
                    </div>
                </div>
                <div class="chat-sl-body" id="chat-sl">
                    
                    <!-- <a href="#" style="text-decoration: none; color: #444;">
                        <div class="user-sl">
                            <div class="user-img">
                                <img src="../asset/img/user7-128x128.jpg" alt="">
                                <div class="chat-md-ls">
                                    <h4>Walida Vice</h4>
                                    <p>last message .......</p>
                                </div>
                            </div>
                            <div class="check">
                                <i class="fa fa-check"></i>
                            </div>
                        </div>
                    </a> -->
                </div>
                <div class="chat-sl-body" id="chat-gl">
                    <div class="displayAllGroups">
                        <!-- DISPLAY ALL GROUPS VERIFIEDS  -->
                    </div>
                    <div class="toggle-post-plus">
                        <i class="fa fa-plus" onclick="openGroupModal()"></i>
                    </div>
                </div>
            </div>
            <!-- start design post col here with html -->
            <div class="col-md-6" id="postBlock">
                <!-- start join and list all group that exit in the site  -->
                <div class="dashboard-grops" id="dashboard-grops" onload="getThis(this)">
                    <!-- <div class="group-part">
                        <img src="../asset/img/profile.jpg" alt="">
                        <div class="part-name">
                            <p>Gdss Gombe</p>
                            <button>Follow</button>
                        </div>
                    </div>                     -->
                </div>
                <!-- end join and list all group that exit in the site  -->
                <div class="posting-block">
                    <div class="displyAllUsersPosting">
                            
                    </div>                   
                    <div class="toggle-post">
                        <i class="fa fa-pencil" onclick="openModalPost()"></i>
                    </div>                  
                </div>
            </div>
            <!-- start design post col here with html -->

            <div class="col-md-3" id="findpeople">
                <div class="chat">
                    <div class="chat-name">
                        <h4>People</h4>
                    </div>
                    <div class="chat-logo">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
                <div class="link">
                    <div class="search-people">
                        <input type="text" placeholder="search...">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
                <div class="link">
                    <div class="all-0" style="width:75%;">
                        <div class="link-requested">
                            <a href="#!" onclick="open_new_tab()">New</a>
                        </div>
                        <div class="link-requested">
                            <a href="#!" onclick="pendding_new_tab()">Pendding</a>
                            <div class="span-pendding">
                                <div id="penddingBadgeRequest">
                                    <!-- show list of pedding request here  -->
                                </div>
                            </div>
                        </div>
                        <div class="link-requested">
                            <a href="#!" onclick="request_new_tab()">Request</a>
                            <div class="span-pendding">
                                <div id="waittingBadgeRequest">
                                    <!-- show list of waitting requested here  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-sl-body" id="new_request_id">
                    <div id="displaySendRequest">
        
                    </div>
                    <div class="display_friending">

                    </div>
                    <!-- display new friends here  -->
                </div>
                <div class="chat-sl-body" id="pendding_request_id">
                    <!-- display pendding new friends here  -->
                    <div id="displaySendRequest12">
        
                    </div>
                    <div class="pendding_request_id">
                        
                    </div>
                </div>
                <div class="chat-sl-body request_requested_id" id="request_requested_id">
                    <!-- display and waitting accept  friends request here here  -->
                </div>
            </div>
        </div>
    </div>

<script src="chat.js" type="text/javaScript"></script>
<script src="modal_post.js"></script>
<script src="comment.js"></script>
<script src="request.js"></script>
<script src="update_profile.js"></script>
<script src="friends.js"></script>
<script src="play.js"></script>
<script src="../javaScript/group_request.js"></script>
<script src="../javaScript/post_script.js"></script>
<script src="../javaScript/privatechat.js"></script>
<script src="../javaScript/notification.js"></script>
<!-- <script src="../javaScript/alert.js"></script> -->
</body>
</html>