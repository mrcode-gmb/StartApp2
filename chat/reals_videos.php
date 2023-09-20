<?php

    include '../controller/user_crud.php';
    $new = new createUsers();

    $get = $new->VideosAll();
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
    <script src="chat.js" type="text/javaScript"></script>
    <link rel="stylesheet" href="../asset/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../asset/bootstrap-icons/bootstrap-icons.css">

</head>
<body>
   <div class="main">
        <div id="reals">
            <!-- start reals videos in mobile phone -->
            <div class="real-mobile">
                <div class="reals-m-md">
                    <a href="user_dashboard.php"><i class="fa fa-arrow-left"></i></a>
                    <!-- <img src="../asset/img/user7-128x128.jpg" alt=""> -->
                </div>
            </div>
            <!-- ended reals videos in mobile phone -->
            <div class="reals-head">
                <div class="reals-top">
                    <div class="logo-name">
                        <div class="title">
                            <a href="user_dashboard.php"><i class="fa fa-arrow-left" id="reals-back"></i></a>
                            <h3 class="hide-reals" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">V</h3>
                            <h4 class="hide-reals" style="color: white; margin-left: -10px;">ideos</h4>
                        </div>
                    </div>
                    <div class="reals-right">
                        <div class="reals-nav">
                            <div class="links-of">
                                <path href="#" style="background: var(--bg-blue-pinks); padding: 8px 9px; border-radius: 50%; color: white; margin-right: 0;">
                                    <i class="fa fa-regular fa-comment-dots" id="comment-system"></i>
                                    <p class="bell" style="top: 10px;">9</p>
                                </path>
                                <path style="background: var(--bg-blue-pinks); padding: 8px 9px; border-radius: 50%; color: white;">
                                    <span class="fa fa-regular fa-bell" onclick="openNotification()"></span>
                                    <p class="bell" style="top: 10px;">6</p>
                                </path>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="notification" style="background: rgba(0, 0, 0, 0.2); color: white; border: none; box-shadow: none;">
                    <div class="not-head" style="border-bottom: solid 1px #333;">
                        <div class="not-tabs">
                            <h4>Notifications</h4>
                            <div class="close-not">
                                <i class="fa fa-times" onclick="closeNotification()"></i>
                            </div>
                        </div>
                        <div class="not-search">
                            <input type="text" placeholder="Search" style="background: none; color: aliceblue;">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                    <div class="not-body" style="background: none;">
                        <div class="not-block" style="border-bottom: solid 1px #333;">
                            <div class="not-user">
                                <img src="../asset/img/studnt_hall.jpeg" alt="">
                                <div class="not-user-name">
                                    <h4 style="color: white;">Abubakar Umar</h4>
                                    <p style="color: #999;">comment on your post ...</p>
                                    <span>2m ago</span>
                                </div>
                            </div>
                            <div class="not-toggle">
                                <i class="fa fa-paperclip"></i>
                            </div>
                        </div>
                        <div class="not-block" style="border-bottom: solid 1px #333;">
                            <div class="not-user">
                                <img src="../asset/img/studnt_hall.jpeg" alt="">
                                <div class="not-user-name">
                                    <h4 style="color: white;">Abubakar Umar</h4>
                                    <p style="color: #999;">comment on your post ...</p>
                                    <span>2m ago</span>
                                </div>
                            </div>
                            <div class="not-toggle">
                                <i class="fa fa-paperclip"></i>
                            </div>
                        </div>
                        <div class="not-block" style="border-bottom: solid 1px #333;">
                            <div class="not-user">
                                <img src="../asset/img/studnt_hall.jpeg" alt="">
                                <div class="not-user-name">
                                    <h4 style="color: white;">Abubakar Umar</h4>
                                    <p style="color: #999;">comment on your post ...</p>
                                    <span>2m ago</span>
                                </div>
                            </div>
                            <div class="not-toggle">
                                <i class="fa fa-paperclip"></i>
                            </div>
                        </div>
                        <div class="not-block" style="border-bottom: solid 1px #333;">
                            <div class="not-user">
                                <img src="../asset/img/studnt_hall.jpeg" alt="">
                                <div class="not-user-name">
                                    <h4 style="color: white;">Abubakar Umar</h4>
                                    <p style="color: #999;">comment on your post ...</p>
                                    <span>2m ago</span>
                                </div>
                            </div>
                            <div class="not-toggle">
                                <i class="fa fa-paperclip"></i>
                            </div>
                        </div>
                        <div class="not-block" style="border-bottom: solid 1px #333;">
                            <div class="not-user">
                                <img src="../asset/img/studnt_hall.jpeg" alt="">
                                <div class="not-user-name">
                                    <h4 style="color: white;">Abubakar Umar</h4>
                                    <p style="color: #999;">comment on your post ...</p>
                                    <span>2m ago</span>
                                </div>
                            </div>
                            <div class="not-toggle">
                                <i class="fa fa-paperclip"></i>
                            </div>
                        </div>
                        <div class="not-block" style="border-bottom: solid 1px #333;">
                            <div class="not-user">
                                <img src="../asset/img/studnt_hall.jpeg" alt="">
                                <div class="not-user-name">
                                    <h4 style="color: white;">Abubakar Umar</h4>
                                    <p style="color: #999;">comment on your post ...</p>
                                    <span>2m ago</span>
                                </div>
                            </div>
                            <div class="not-toggle">
                                <i class="fa fa-paperclip"></i>
                            </div>
                        </div>
                        <div class="not-block" style="border-bottom: solid 1px #333;">
                            <div class="not-user">
                                <img src="../asset/img/studnt_hall.jpeg" alt="">
                                <div class="not-user-name">
                                    <h4 style="color: white;">Abubakar Umar</h4>
                                    <p style="color: #999;">comment on your post ...</p>
                                    <span>2m ago</span>
                                </div>
                            </div>
                            <div class="not-toggle">
                                <i class="fa fa-paperclip"></i>
                            </div>
                        </div>
                        <div class="not-block" style="border-bottom: solid 1px #333;">
                            <div class="not-user">
                                <img src="../asset/img/studnt_hall.jpeg" alt="">
                                <div class="not-user-name">
                                    <h4 style="color: white;">Abubakar Umar</h4>
                                    <p style="color: #999;">comment on your post ...</p>
                                    <span>2m ago</span>
                                </div>
                            </div>
                            <div class="not-toggle">
                                <i class="fa fa-paperclip"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                while($row = $get->fetch()){
                    echo '<div class="real-videos">
                <div class="real-v-top">
                    <div class="real-left">
                        <img src="../asset/img/user8-128x128.jpg" alt="">
                        <div class="real-l-name">
                            <h4>abubakar001</h4>
                            <p>1 day ago <i class="fa fa-earth-africa"></i></p>
                        </div>
                    </div>
                    <div class="real-right">
                        <i class="fa fa-align-right"></i>
                    </div>
                </div>
                <div class="real-live">
                    <video  src="videos/'.$row['video'].'" id="playRealsV'.$row['v_id'].'"></video>
                </div>
                <div class="real-play">
                    <div class="play-reals">
                        <i class="fa fa-play play-btn" id="play-btn'.$row['v_id'].'" onclick="playReals('.$row['v_id'].')"></i>
                    </div>
                    <div class="play-reals">
                        <i class="fa  fa-pause pause-btn" id="pause-btn'.$row['v_id'].'" onclick="pauseReals('.$row['v_id'].')"></i>
                    </div>
                </div>
                <div class="real-bottom">
                    <div class="bottom-r-icons">
                        <div class="like-real">
                            <i class="fa fa-regular fa-heart"></i>
                            <span>120</span>
                        </div>
                        <div class="like-real">
                            <i class="fa fa-regular fa-thumbs-down"></i>
                            <span>45</span>
                        </div>
                        <div class="like-real">
                            <i class="fa fa-regular fa-comment"></i>
                            <span>91</span>
                        </div>
                        <div class="like-real">
                            <i class="bi bi-download"></i>
                            <span>6</span>
                        </div>
                    </div>
                </div>
            </div>';
                }
            
            ?>
            
            <!-- <div class="real-videos">
                <div class="real-v-top">
                    <div class="real-left">
                        <img src="../asset/img/user8-128x128.jpg" alt="">
                        <div class="real-l-name">
                            <h4>abubakar001</h4>
                            <p>1 day ago <i class="fa fa-earth-africa"></i></p>
                        </div>
                    </div>
                    <div class="real-right">
                        <i class="fa fa-align-right"></i>
                    </div>
                </div>
                <div class="real-live">
                    <video src="../1.mp4" autoplay id="playRealsV"></video>
                </div>
                <div class="real-play">
                    <div class="play-reals">
                        <i class="fa  fa-play" id="play-btn" onclick="playReals()"></i>
                    </div>
                    <div class="play-reals">
                        <i class="fa  fa-pause" id="pause-btn" onclick="pauseReals()"></i>
                    </div>
                </div>
                <div class="real-bottom">
                    <div class="bottom-r-icons">
                        <div class="like-real">
                            <i class="fa fa-regular fa-heart"></i>
                            <span>120</span>
                        </div>
                        <div class="like-real">
                            <i class="fa fa-regular fa-thumbs-down"></i>
                            <span>45</span>
                        </div>
                        <div class="like-real">
                            <i class="fa fa-regular fa-comment"></i>
                            <span>91</span>
                        </div>
                        <div class="like-real">
                            <i class="bi bi-download"></i>
                            <span>6</span>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
   </div>

   <script>
    function playReals(id) {
        // alert()
        document.getElementById("playRealsV"+id).play();
        document.getElementById("play-btn"+id).style.display = "none";
        document.getElementById("pause-btn"+id).style.display = "block";
    }
    function pauseReals(idPause){
        document.getElementById("playRealsV"+idPause).pause();
        document.getElementById("pause-btn"+idPause).style.display = "none";
        document.getElementById("play-btn"+idPause).style.display = "block";
    }
   </script>
</body>
</html>