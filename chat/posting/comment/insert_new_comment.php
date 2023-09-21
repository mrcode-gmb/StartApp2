<?php
    // namespace 
    include_once ("../../../controller/CreateNewPostingController.php");
    include_once ("../../session_destry.php");
    $newObj = new CreateNewPostingController();
    
    
    $userID         = $_POST['user_postId'];
    $postId         = $_POST['post_id'];
    $senderId       = $_SESSION['id'];
    $commentContent = $_POST['comment_content'];


    if(!empty($commentContent)){
        $selectAll = $newObj->createNewCommentFunction($userID,$postId,$senderId,$commentContent);
    }
    
    

?>