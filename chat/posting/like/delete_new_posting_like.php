<?php
    include_once ("../../../controller/CreateNewPostingController.php");
    include_once ("../../session_destry.php");
    $newObj = new CreateNewPostingController();


    $postId = $_GET['postingId'];
    $setId  = $_SESSION['id'];


    $selectAll = $newObj->DestoryPostingIdLike($postId,$setId);
?>