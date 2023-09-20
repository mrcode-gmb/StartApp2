<?php
    include_once ("../../controller/CreateNewPostingController.php");
    include_once ("../session_destry.php");
    $newObj = new CreateNewPostingController();

    $poster_id           = $_POST['poster_id'];
    $contentArea         = $_POST['postingContent'];
    $postFile            = $_FILES['postFile']['name'];
    $postFileSize        = $_FILES['postFile']['size'];
    $postFileTmp         = $_FILES['postFile']['tmp_name'];
    $postingFolder       = "postingImages/".$postFile;

    if(!empty($contentArea) || !empty($postFile)){
        if($postFileSize > 5000000){

        }
        else{
            $insert = $newObj->store($poster_id,$contentArea,$postFile);
            move_uploaded_file($postFileTmp,$postingFolder);
        }
    }

?>