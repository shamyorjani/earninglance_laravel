<?php
session_start();
include "../inc/dbcon.php";
if(isset($_POST['withdrawamnt'])){
    $withamnt = $_POST['amnt'];
    $withmethod = $_POST['method'];
    $blnc = $_POST['blnc'];
    $acc = $_POST['acc'];
    $username = $_POST['username'];
    $title = $_POST['title'];
    $details = $acc .",". $title;
    if($withamnt > $blnc){
        $_SESSION['msg'] = "Please withdraw correct amount! otherwise your account will be blocked! _danger";
        ?>
        <script>
            location.replace('index.php');
        </script>
        <?php
    }
    else{
    $withreqq = mysqli_query($con,"INSERT INTO `withdrawl_request`(`username`, `amount`, `details`, `method_id`) VALUES ('$username','$withamnt','$details','$withmethod')");
        if($withreqq){
            $userbq = mysqli_query($con,"UPDATE users SET balance = balance - '$withamnt' WHERE username = '$username'");
            $_SESSION['msg'] = "Withrawl request sent success! _success";
            ?>
            <script>
                location.replace('index.php');
            </script>
            <?php
        }
    }
    }
?>