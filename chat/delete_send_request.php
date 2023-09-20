
<?php
    include_once ("session_destry.php");
    include_once ("../controller/user_crud.php");

    $newObj = new createUsers();
    $insert = $newObj->deleteSendedRequest($_GET['delete_id'],$_SESSION['id']);
    echo '<div class="position-fixed" id="position-fixed">
            <div class="alert-flex">
                <h5><i class="fa fa-triangle-exclamation"></i> Request Canceled !</h5>
                <p id="percentAll" style="display: none;">0%</p>
            </div>
            <div class="loader-green">
                <div class="shows-green" id="shows">
                    
                </div>
            </div>
        </div>';
?>