<?php

    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");
    $update = new createUsers();
    $id = $_SESSION['id'];
    if(isset($_POST['update_profile'])){
        $update_file = $_FILES['update_file']['name'];
        $update_size = $_FILES['update_file']['size'];
        $update_tmp = $_FILES['update_file']['tmp_name'];
        $update_folder = "../userpicture/".$update_file;
        $id = $_SESSION['id'];

        if($update_file == ""){
            
        }
        else{
            if($update_size > 3000000){

            }
            else{
                $update->update_profile_pic($update_file,$id);
                move_uploaded_file($update_tmp, $update_folder);
            }
        }
    }

    $select = $update->select_profile_pic($id);
    if($select){
        $row = $select->fetch();
        unset($_SESSION['profile_pic']);
        $_SESSION['profile_pic'] = $row['profile_pic'];
    }

    
?>
<?php
    $mess ="";
    if(isset($_POST['update'])){
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $gender = $_POST['gender'];
        $pnumber = $_POST['phone_number'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];

        if(empty($fname) || empty($lname) || empty($gender) || empty($pnumber) || empty($email) || empty($dob)){
            $result = '<div class="sweet-alerts" id="singleAlert">
                        <div class="sweet-flex">
                            <div class="sweet-head">
                                <p>All fields must not be empty.</p>
                            </div>
                            <div class="sweet-footer">
                                <p onclick="close_alert()">Ok</p>
                            </div>
                        </div>
                    </div>';

        }
        else{
            $update->update($fname,$lname,$gender,$pnumber,$email,$dob,$id);
            header("location:reload.php");
            
        }

    }

?>

<?php
$result = "";
    if(isset($_POST['chanepassword'])){
        $oldpass = $_POST['oldpass'];
        $new_pass = $_POST['new_pass'];
        $c_pass = $_POST['c_pass'];

        if(empty($oldpass) || empty($new_pass) || empty($c_pass)){
            $result = '<div class="sweet-alerts" id="singleAlert">
                        <div class="sweet-flex">
                            <div class="sweet-head">
                                <p>All fields must not be empty.</p>
                            </div>
                            <div class="sweet-footer">
                                <p onclick="close_alert()">Ok</p>
                            </div>
                        </div>
                    </div>';

        }
        else{
            if(!empty($oldpass) && !empty($new_pass) && !empty($c_pass)){
            
                $old = $update->oldPassword($oldpass,$id);
                if($old->rowCount()>0){
                    if($new_pass != $c_pass){
                        $result = '<div class="sweet-alerts" id="singleAlert">
                                    <div class="sweet-flex">
                                        <div class="sweet-head">
                                            <p>Comfirm password not march.</p>
                                        </div>
                                        <div class="sweet-footer">
                                            <p onclick="close_alert()">Ok</p>
                                        </div>
                                    </div>
                                </div>';
                    }else{
                        $newpass = $update->newpassword($new_pass,$id);
                        $result = '<div class="sweet-alerts" id="singleAlert">
                        <div class="sweet-flex">
                            <div class="sweet-head">
                                <p>Change password successfully !!.</p>
                            </div>
                            <div class="sweet-footer">
                                <p onclick="close_alert()">Ok</p>
                            </div>
                        </div>
                    </div>';
                    }
                }
                else{
                    $result = '<div class="sweet-alerts" id="singleAlert">
                        <div class="sweet-flex">
                            <div class="sweet-head">
                                <p>You old password was entered incorrect. Please enter it again.</p>
                                <p id="percentAll" style="display:none;"></p>
                            </div>
                            <div class="sweet-footer">
                                <p onclick="close_alert()">Ok</p>
                            </div>
                        </div>
                    </div>';
                }
            }
        }
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
    <script src="chat.js" type="text/javaScript"></script>    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../asset/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../asset/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="modal.css">
    <script src="modal_post.js"></script>
    <script src="comment.js"></script>
    <link rel="stylesheet" href="user_profile.css">
    <script src="update_profile.js"></script>

</head>
<body>
<div id="display-full">
        <!-- view images with full screen -->
    </div>
    <!-- view posting here  -->
    <div class="d-hide">
        <div id="viewPosting">
            
        </div>
    </div>
    <!-- view private here  -->
    <?php 
        if(isset($_GET['true'])){
            echo '<div class="sweet-alerts" id="sweet-alert">
                        <div class="sweet-flex">
                            <div class="sweet-head">
                                <p>Update profile information successfully !</p>
                            </div>
                            <div class="sweet-footer">
                                <p onclick="close_true()">Ok</p>
                            </div>
                        </div>
                    </div>';

        }
    ?>
    <?php echo $result;?>
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

    <!-- upload profile here  -->
    <form  method="post" enctype="multipart/form-data">
        <div class="hidelink">
                <div class="uploaded">
                    <div class="upload-pic">
                        <div class="upload-header">
                            <h4>Update profile picture</h4>
                            <i class="fa fa-times" onclick="closeUpdatePic()"></i>
                        </div>
                        <div class="upload-body">
                            <label for="update-profile">
                                <h4 onchange="updateimage(event)"><i class="fa fa-plus"></i> Choose Profile</h4></h4>
                            </label>
                            <input type="file" id="update-profile" accept="image/*" name="update_file" onchange="updateimage(event)">
                        </div>
                        <div class="show-profile" id="show-profile">
                            <img  id="updateProfile" alt="">
                            <i class="fa fa-times" onclick="closeImgUpdate()"></i>
                        </div>
                        <div class="update-pic-button">
                            <button type="submit" id="update_profile" name="update_profile">Update profile</button>
                        </div>
                    </div>
                </div>
        </div>
    </form>
    <!-- upload profile here  -->

    <div class="main">   
        <!-- start header of my website       -->
        <div class="headers-mess">
            <div class="heads">
                <div class="logo-name">
                    <div class="title">
                        <h3>L</h3>
                        <h4>StartApp</h4>
                    </div>
                    <div class="menu-db">
                        <i class="fa fa-bars" id="time-open" onclick="mobileToggleProfileBtn()"></i>
                        <i class="fa fa-times" id="time-close" onclick="mobileToggleProfileBtn()"></i>
                    </div>
                </div>
                <div class="links-of">
                    <path href="#">
                        <a href="user_dashboard.php" ><i class="fa fa-home" id="comment-system"></i></a>
                        <i class="bi bi-people" style="font-size: 22px;" id="comment-mobile" onclick="openPeople()"></i>
                        <p href="" class="bell">2</p>
                    </path>
                    <path href="#">
                        <a href="user_dashboard.php" ><i class="bi bi-people" style="font-size: 22px;" id="comment-system"></i></a>
                        <i class="fa fa-regular fa-comment" id="comment-mobile" onclick="openMessage()"></i>
                    </path>
                    <path href="#">
                        <a href="user_dashboard.php" ><i class="fa fa-regular fa-comment" id="comment-system"></i></a>
                        <i class="fa fa-home" id="comment-mobile" onclick="openHomePage()"></i>
                        <!-- <p href="" class="bell">9</p> -->
                    </path>
                    <path>
                        <span class="fa  fa-regular fa-bell" onclick="openNotification()"></span>
                        <p href="" class="bell">6</p>
                    </path>
                    <path href="#">
                        <i class="bx bx-video" style="font-size: 24px; transform: rotate(180deg);"></i>
                    </path>
                    <path href="#" onclick="toggleProfileBtn()" id="user_pro">
                        <i class="fa  fa-regular fa-user"></i>
                        <i class="fa fa-angle-up" style="margin-left: 3px;"></i>
                    </path>
                    <div class="drop-pro" id="drop-pro">
                        <div class="header-drop">
                            <div class="drop-left">
                                <h3>Hi Abubakar</h3>
                            </div>
                            <div class="drop-right">
                                <button onclick="mobileToggleProfileBtn()" type="button">close</button>
                            </div>
                        </div>
                        <?php
                             if($_SESSION['profile_pic'] == ""){
                                echo '<img src="../asset/img/profile.jpg" alt="">';
                            }
                            else{
                                echo '<img src="../userpicture/'.$_SESSION['profile_pic'].'" alt="">';
                            }
                        
                        ?>
                        <div class="name-pro">
                            <h4><?php echo $_SESSION['firstName']; echo $_SESSION['lastName'];?></h4>
                            <P>@<?php echo $_SESSION['username'];?></P>
                        </div>
                        <div class="pro-link">
                            <div class="pro-linked">
                                <div class="col-warrap">
                                    <a href="user_profile.php">
                                        <i class="fa fa-user"></i>
                                        <span>my account</span>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-image"></i>
                                        <span>create post</span>
                                    </a>
                                </div>
                                <div class="col-warrap">
                                    <a href="#">
                                        <i class="fa fa-user-plus"></i>
                                        <span>edit account</span>
                                        <a href="#">
                                            <i class="fa fa-cog"></i>
                                            <span>setting</span>
                                        </a>
                                    </a>
                                </div>                                
                                <div class="col-warrap">
                                    <a href="#" class="col-warrap-a">
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
        <div class="row-profile">
            <div class="user-profile">
                <img src="../asset/img/cover-image.png" alt="" class="img">
                <div class="user-profile-data">
                    <div class="user-connect">
                        <div class="camera-user">
                            <a href="user_dashboard.php"><span class="fa fa-arrow-left" id="top-0"></span></a>
                            <i class="fa fa-check"></i>
                        </div>
                        <button><a href="logout.php">Logout <i class="fa fa-sign-out"></i></a></button>
                    </div>
                    <div class="user-data">
                        <?php 
                            
                            if($_SESSION['profile_pic'] == ""){
                                echo '<img src="../asset/img/profile.jpg" alt="">';
                            }
                            else{
                                echo '<img src="../userpicture/'.$_SESSION['profile_pic'].'" alt="">';
                            }
                        ?>
                        <i class="fa fa-camera" onclick="openUploadPic()"></i>
                        <div class="user-username">
                            <h4><?php echo $_SESSION['firstName']; echo " "; echo $_SESSION['lastName'];?></h4>
                            <p>@<?php echo $_SESSION['username'];?></p>
                        </div>
                    </div>
                </div>
                <div class="user-tabs">
                    <li class="user-table-li">
                        <a href="#" onclick="openpostingprofile()">Post</a>
                    </li>
                    <li class="user-table-li">
                        <a href="#">Details</a>
                    </li>
                    <li class="user-table-li">
                        <a href="#" onclick="openeditprofile()">Edit Profile</a>
                    </li>
                </div>
            </div>
            <div class="bg-light" style="background: white; width: 100%; padding: 10px 0;">
                <div class="col-md-user-6">
                    <div class="posting-block-profile" id="profile-posting">
                        <div class="displyAllProfilesPosting">
                                
                        </div>
                        <div class="toggle-post">
                            <i class="fa fa-pencil" onclick="openModalPost()"></i>
                        </div>                  
                    </div>
                    <div id="profile-edit">
                        <div class="edit-form-head">
                            <h4>Edit Profile</h4>
                        </div>
                        <form action="" method="post">
                            <div class="edit-form-body">
                                <div class="edit-col-md-6">
                                    <div class="form-group">
                                        <label for="">First name</label>
                                        <input type="text" name="first_name" value="<?php echo $row['first_name']?>">
                                    </div>
                                </div>
                                <div class="edit-col-md-6">
                                    <div class="form-group">
                                        <label for="">Last name</label>
                                        <input type="text" name="last_name" value="<?php echo $row['last_name']?>" >
                                    </div>
                                </div>
                                <div class="edit-col-md-6">
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <input type="text"  name="gender" value="<?php echo $row['gender']?>">
                                    </div>
                                </div>
                                <div class="edit-col-md-6">
                                    <div class="form-group">
                                        <label for="">Phone number</label>
                                        <input type="text"name="phone_number" value="<?php echo $row['phone_number']?>" >
                                    </div>
                                </div>
                                <div class="edit-col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" value="<?php echo $row['email']?>">
                                    </div>
                                </div>
                                <div class="edit-col-md-6">
                                    <div class="form-group">
                                        <label for="">Date of birth</label>
                                        <input type="text" name="dob" value="<?php echo $row['dob']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button name="update">Update</button>
                                </div>
                            </div>
                        </form>
                        <form action="" method="post">
                            <div class="head-password">
                                <h4>Change password</h4>
                            </div>
                            <div class="edit-form-body">
                                <div class="edit-col-md-6-pass">
                                    <div class="form-group">
                                        <label for="">Old password</label>
                                        <input type="password" name="oldpass">
                                    </div>
                                </div>
                                <div class="edit-col-md-6-pass">
                                    <div class="form-group">
                                        <label for="">New password</label>
                                        <input type="password" name="new_pass">
                                    </div>
                                </div>
                                <div class="edit-col-md-6-pass">
                                    <div class="form-group">
                                        <label for="">New password</label>
                                        <input type="password" name="c_pass">
                                    </div>
                                </div>
                                <div class="form-group">
                                <button name="chanepassword">change password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    
    <script src="../javaScript/profile_post.js"></script>
    <script src="chat.js" type="text/javaScript"></script>
    <script src="modal_post.js"></script>
    <script src="comment.js"></script>
    <script src="play.js"></script>
    <script src="../javaScript/post_request.js"></script>
    <script src="update_profile.js"></script>
    <script src="../javaScript/group_request.js"></script>
    <script src="../javaScript/post_script.js"></script>
    <script>
        let loaderGreen = document.querySelector(".shows-green"),
        hideAlert       = document.querySelector("#position-fixed"),
        percentage = document.querySelector("#percentAll");

        let loaderStartAll = 0; let loaderEndAll = 100; let loaderTimeAll = 30;

        let startAll = setInterval(() => {
            loaderStartAll++;

            percentage.textContent = loaderStartAll+'%';
            loaderGreen.style.width = `${loaderStartAll}%`;


            if(loaderStartAll == loaderEndAll){
                clearInterval(startAll);
                hideAlert.style.display = "none";
            }
        },loaderTimeAll);
        
    </script>
</body>
</html>