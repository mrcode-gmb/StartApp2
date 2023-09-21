<?php
    include_once ("../session_destry.php");
    include_once ("../../controller/NotificationController.php");
    $note   = new NotificationController();

    $id = $_SESSION['id'];

    $noted = $note->UpdateCommentNote($id);

?>