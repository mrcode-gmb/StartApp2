<?php
    session_start();
    include_once '../controller/user_crud.php';

    $obj = new createUsers();

   $id = $_SESSION['id'];
   if (isset($id)) {
        $update = $obj->logouted($id);
        session_unset();
        header("location:../create_login_account/?logout=true");
   }
    

?>