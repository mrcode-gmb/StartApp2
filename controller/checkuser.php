<!-- ?php
    $conn = mysqli_connect("localhost", "root", "", "start_app");
    if(isset($_POST['email'])){
        $username = $_POST['email'];

        $select1 = "SELECT * FROM users WHERE username = '$username'";
        $query = mysqli_query($conn,$select1);
        if(mysqli_num_rows($query)>0){
            echo "good";
        }
        else{
            echo "failed";
        }
        
    }

?> -->
<?php
    class createUsers{

        public function __construct(){
            $this->dbConn = new pdo("mysql:host=localhost; dbname=start_app", "root", "37858023");
        }
    
        public function chack(){
            $select1 = "SELECT * FROM users WHERE username = ?";
            $query1 = $this->dbConn->prepare($select1); 
            $query1->execute([$_POST['username']]);
            return $query1;
        } 

    }
    $obg = new createUsers();
    $call = $obg->chack();
    if($call->rowCount() > 0){
        echo "<div style='color: red;'>username is not available</div>";
    }
    else{
        echo "<div style='color: green;'>username is available</div>";
    }
?>
