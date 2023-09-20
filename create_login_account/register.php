<?php

    include ("../controller/user_crud.php");
    $insert = new createUsers();

    // if already loged not back 
    if(isset($_SESSION['id'])){
        header("location:../chat/user_dashboard.php");
    }

    $mess = "";
    if(isset($_POST['submit'])){
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $gender = $_POST['gender'];
        $pnumber = $_POST['phone_number'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $rpass = $_POST['re_pass'];

        if(empty($fname) || empty($lname) || empty($gender) || empty($pnumber) || empty($email) || empty($dob) || empty($username) || empty($pass) || empty($rpass)){
            $mess = '<div class="position-fixed-green" id="position-fixed">
                        <div class="alert-flex">
                            <h5><i class="fa fa-triangle-exclamation"></i> &nbsp; All field must not be empty !</h5>
                            <p id="percentAll" style="display: none;">0%</p>
                        </div>
                        <div class="loader-green">
                            <div class="shows-green" id="shows">
                                
                            </div>
                        </div>
                    </div>';
        }
        else{
            if($pass != $rpass){
                $mess = '<div class="position-fixed-green" id="position-fixed">
                        <div class="alert-flex">
                            <h5><i class="fa fa-triangle-exclamation"></i> &nbsp; Comfirm password not march !</h5>
                            <p id="percentAll" style="display: none;">0%</p>
                        </div>
                        <div class="loader-green">
                            <div class="shows-green" id="shows">
                                
                            </div>
                        </div>
                    </div>';
            }
            else{
                $check = $insert->backchack($username);
                if($check->rowCount()>0){
                    $mess = '<div class="position-fixed-green" id="position-fixed">
                        <div class="alert-flex">
                            <h5><i class="fa fa-triangle-exclamation"></i> &nbsp; This username already exist!</h5>
                            <p id="percentAll" style="display: none;">0%</p>
                        </div>
                        <div class="loader-green">
                            <div class="shows-green" id="shows">
                                
                            </div>
                        </div>
                    </div>';
                }
                else{
                    $insert->createUser($fname,$lname,$gender,$pnumber,$email,$dob,$username,$pass);
                    header("location:index.php?register=".$username."");
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
    <title>Login And Register Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../asset/fontawesome-free/css/all.min.css">
    <script src="https://kit.fontawesome.com/f34095d19d.js" crossorigin="anonymous"></script>
    <style>
        #secondTabs{
            display: none;
        }
        #thirdTabs{
            display: none;
        }
        .form-group-btn{
            width: 100%;
            display: flex;
            padding: 19px 0;
            justify-content: left;
            align-items: center;
        }
        .form-group-btn button{
            width: 20%;
            padding: 9px 5px;
            outline: none;
            border: solid 1px #efefef;
            border-radius: 5px;
            font-weight: 700;
            font-size: 16px;
            color: white;
            background: var(--bg-blue-pinks);
            margin-bottom: 15px;
            margin-right: 10px;

        }
        .form-group-btn button:hover{
            background: var(--bg-hover);
        }
        
    </style>
</head>
<body>
    <?php echo $mess;?>
    
    <div class="main">
        <div class="form">
            <div class="alter">
                <div class="create" id="create" style="display: block;">
                    <div class="login-header">
                        <h4>Create New Account</h4>
                    </div>
                    <form method="POST" id="form" autocomplete enctype="multipart/form-data">
                        <div class="login-body" id="firstTabs">
                            <div class="page-nt">
                                <div class="circle bg-dark"></div>
                                <div class="circle"></div>
                                <div class="circle"></div>
                            </div>
                            <div class="form-group">
                                <label>First name <span class="required">*</span></label>
                                <input type="text" name="first_name" value="<?php if(isset($_POST['submit'])){ echo $_POST['first_name'];}?>">
                            </div>
                            <div class="form-group">
                                <label>Last Name <span class="required">*</span></label>
                                <input type="text" name="last_name" value="<?php if(isset($_POST['submit'])){ echo $_POST['last_name'];}?>">
                            </div>
                            <div class="form-group">
                                <label>Gender <span class="required">*</span></label>
                                <input type="text" name="gender" value="<?php if(isset($_POST['submit'])){ echo $_POST['gender'];}?>">
                            </div>
                            <div class="form-group">
                                <button type="button" onclick="openSecondTab()">Next</button>
                            </div>
                            <div class="form-group-account">
                                <p><i class="fa fa-arrows-rotate"></i></p>
                                <button class="btn-outline">
                                    <a href="index.php">Already have an account</a>
                                </button>
                            </div>
                        </div>
                        <!-- second tabs -->
                        <div class="login-body" id="secondTabs">
                            <div class="page-nt">
                                <div class="circle"></div>
                                <div class="circle bg-dark"></div>
                                <div class="circle"></div>
                            </div>
                            <div class="form-group">
                                <label>Phone number <span class="required">*</span></label>
                                <input type="text" name="phone_number" value="<?php if(isset($_POST['submit'])){ echo $_POST['phone_number'];}?>">
                            </div>
                            <div class="form-group">
                                <label>Email <span class="required">*</span></label>
                                <input type="text" name="email" value="<?php if(isset($_POST['submit'])){ echo $_POST['email'];}?>">
                            </div>
                            <div class="form-group">
                                <label>Date of birth <span class="required">*</span></label>
                                <input type="date" name="dob" value="<?php if(isset($_POST['submit'])){ echo $_POST['dob'];}?>">
                            </div>
                            <div class="form-group-btn">
                                <button type="button" class="btn-blue" onclick="returnTabA()">Back</button>
                                <button type="button" onclick="openTabC()">Next</button>
                            </div>
                        </div>
                        <!-- third tabs which end tabs  -->
                        <div class="login-body" id="thirdTabs">
                            <div class="page-nt">
                                <div class="circle"></div>
                                <div class="circle"></div>
                                <div class="circle bg-dark"></div>
                            </div>
                            <div class="form-group">
                                <label>Create username  <span class="required">*</span></label>
                                <input type="text" onkeyup="Send_Data()"  name="username" value="<?php if(isset($_POST['submit'])){ echo $_POST['username'];}?>">
                                <span id="response"></span>
                            </div>
                            <div class="form-group">
                                <label>Create password <span class="required">*</span></label>
                                <input type="password" id="showNewPassword" name="pass" value="<?php if(isset($_POST['submit'])){ echo $_POST['pass'];}?>">
                                <i class="fa fa-eye" id="show2"></i>
                            </div>
                            <div class="form-group">
                                <label>Re-type password <span class="required">*</span></label>
                                <input type="password" id="showComfirmPassword" name="re_pass" value="<?php if(isset($_POST['submit'])){ echo $_POST['re_pass'];}?>">
                                <i class="fa fa-eye" id="show3"></i>
                            </div>
                            <div class="form-group-btn">
                                <button type="button" class="btn-blue" onclick="returnTabB()">Back</button>
                                <button type="submit" id="" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end create account here  -->
            </div>
        </div>
    </div>
    <script src="reg.js"></script>
    <script>
        let loaderGreen = document.querySelector(".shows-green"),
        hideAlert       = document.querySelector("#position-fixed"),
        percentage = document.querySelector("#percentAll");

        let loaderStartAll = 0, loaderEndAll = 100, loaderTimeAll = 30;

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
    <!-- <script src="validate_form.js"></script> -->
</body>
</html>