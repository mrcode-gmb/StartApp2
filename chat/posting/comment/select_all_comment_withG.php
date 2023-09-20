<?php
    // namespace 
    include_once ("../../../controller/CreateNewPostingController.php");
    include_once ("../../session_destry.php");
    $newObj = new CreateNewPostingController();
    
    

    $postId         = $_POST['post_id'];
    // $senderId       = $_SESSION['id'];

    $comment = $newObj->SelectAllCommentFunction($postId);
    
    if($comment->rowCount() > 0){
        while ($rowComt = $comment->fetch()){
            echo '<div class="comment-them-list">';
                    if($rowComt['profile_pic'] == ""){
                        echo '<img  src="../asset/img/profile.jpg">';
                    }
                    else{
                        echo '<img src="../userpicture/'.$rowComt['profile_pic'].'" alt="">';
                    }
                    echo '<div class="comment-content-mb">
                        <p>'.$rowComt['first_name'].' '.$rowComt['last_name'].'</p>
                        <div class="comment-name">
                            <p>'.$rowComt['comment_content'].'</p>
                        </div>
                        <span>'.$newObj->time_agoF($rowComt['time_zone']).'</span>
                    </div>
                </div>';
        }
    }

?>

<!-- <div class="comment-them-list">
    <img src="../asset/img/user5-128x128.jpg" alt="">
    <div class="comment-content-mb">
        <p>muhammad bello</p>
        <div class="comment-name">
            <p>Greate photo so onedafull Greate photo so onedafullGreate photo so onedafull Greate photo so onedafull </p>
            <p>Greate photo so onedafull Greate photo so onedafullGreate photo so onedafull Greate photo so onedafull </p>
            ?php
                    // date_default_timezone_set("Africa/Lagos");

                    // echo "<p>" . date("d M, Y. h:i a") . "</p>";
                                            ?>
        </div>
        <span>1 ags,2023 1:00 pm</span>
    </div>
</div> -->