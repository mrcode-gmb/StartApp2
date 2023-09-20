<?php
    include_once ("../controller/user_crud.php");
    $mess = "";
    session_start();
    $obj = new createUsers();

    // if already loged not back 
    if(isset($_SESSION['id'])){
        header("location:../chat/user_dashboard.php");
    }

    if(isset($_POST['logins'])){
        $key_check = $_POST['public_key'];
        $pass = $_POST['password'];

        if(empty($key_check) || empty($pass)){
            $mess = '<div class="position-fixed-green" id="position-fixed-green">
                        <div class="alert-flex">
                            <h5><i class="fa fa-triangle-exclamation"></i> &nbsp; All fields must not be empty !</h5>
                            <p id="percentAll" style="display: none;">0%</p>
                        </div>
                        <div class="loader-green">
                            <div class="shows-green" id="shows-green">
                                
                            </div>
                        </div>
                    </div>';
        }
        else{
            $login = $obj->userlogin($key_check,$pass);
            while($row = $login->fetch()){
                $_SESSION['firstName'] = $row['first_name'];
                $_SESSION['lastName'] = $row['last_name'];
                $_SESSION['public_id'] = $row['public_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['profile_pic'] = $row['profile_pic'];
            }

            if($login->rowCount()>0){
                header("location:../chat/user_dashboard.php");
            }
            else{
                $mess = '<div class="position-fixed-green" id="position-fixed-green">
                        <div class="alert-flex">
                            <h5><i class="fa fa-triangle-exclamation"></i> &nbsp; User not found</h5>
                            <p id="percentAll" style="display: none;">0%</p>
                        </div>
                        <div class="loader-green">
                            <div class="shows-green" id="shows-green">
                                
                            </div>
                        </div>
                    </div>';
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
    <title>Login And Register Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/all.min.css">
    <script src="https://kit.fontawesome.com/f34095d19d.js" crossorigin="anonymous"></script>

</head>
<body>
<?php
        $messing ="";
        if(isset($_GET['register'])){
            $messing =  '<div class="position-fixed-green" style="background: #d4edda; z-index:1000; top: 30px;" id="position-fixed-greene">
                        <div class="alert-flex">
                            <h5 style="color: #155724; font-weight: 900;"><i class="fa fa-triangle-exclamation"></i> &nbsp; Hi, '.$_GET['register'].'.</h5>
                            <p style="color: #155724; font-family: Verdana, Geneva, Tahoma, sans-serif; margin-top: 10px;">congratulation your startapp account has created successfully</p>
                            <p id="percentAlle" style="display: none;">0%</p>
                        </div>
                        <div class="loader-green" style="background: #d4edda;">
                            <div class="shows-green" id="shows-greene" style="background: #155724;" id="shows">
                                
                            </div>
                        </div>
                    </div>';
        }
        if(isset($_GET['logout'])){
            echo '<div class="position-fixed-green" style="background: #d4edda; z-index:1000; top: 30px;" id="position-fixed-greene">
                        <div class="alert-flex">
                            <h5 style="color: #155724; font-weight: 900;"><i class="fa fa-triangle-exclamation"></i> &nbsp; Logout successfully !!!</h5>
                            <p id="percentAlle" style="display: none;">0%</p>
                        </div>
                        <div class="loader-green" style="background: #d4edda;">
                            <div class="shows-green" id="shows-greene" style="background: #155724;" id="shows">
                                
                            </div>
                        </div>
                    </div>';
        }
    ?>
    <?php echo $mess;?>
    <?php echo $messing;?>
    
    <div class="main">
        <div class="form">
            <div class="alter">
                <div class="register" id="register">
                    <div class="login-header">
                        <h4>Start App</h4>
                    </div>
                    <div class="login-body">
                        <form method="POST">
                            <!-- <div class="form-group" style="margin-top: -16px;">
                            </div> -->
                            <div class="form-group">
                                <label>Mobile number, email or username</label>
                                <input type="text" name="public_key" value="<?php if(isset($_POST['logins'])){ echo $_POST['public_key'];}?>">
                                <!-- <div class="error" id="error_email"></div> -->
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" value="<?php if(isset($_POST['logins'])){ echo $_POST['password'];}?>" onkeyup="validateLogIn()" id="passwordLogin">
                                <i class="fa fa-eye" id="show1"></i>
                            </div>
                            <div class="form-group-page">
                                <div class="for-check">
                                    <input type="checkbox" checked required>
                                    <p>Remember me</p>
                                </div>
                                <div class="for-pass">
                                    <a href="#" onclick="forgot()" onkeyup="validateLogIn()">Forgot password ?</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="logins">Login</button>
                            </div>
                            <div class="form-group-account">
                                <p><i class="fa fa-arrows-rotate"></i></p>
                                <button class="btn-outline">
                                    <a href="register.php" >Create New Account</a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- forgot password  -->
                <div class="forgot" id="password">
                    <div class="login-header">
                        <h4>Forgot Password</h4>
                        <!-- <div class="page-nt">
                            <div class="circle"></div>
                            <div class="circle"></div>
                            <div class="circle bg-dark"></div>
                        </div> -->
                    </div>
                    <div class="login-body" style="width: 95%; margin: auto;">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="text" placeholder="">
                        </div>
                        <div class="form-group">
                            <button>Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="main.js"></script>
    <!-- <script src="validate_form.js"></script> -->
</body>
</html>