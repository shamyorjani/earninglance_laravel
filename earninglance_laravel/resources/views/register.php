<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Earninglance</title>

    <!-- Bootstrap core CSS -->
    <link href="vendorss/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php
  include "inc/header.php";
  include "inc/dbcon.php";
  $msg = "";
  if(isset($_POST['register'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $refral = $_POST['refral'];
    $phone = $_POST['phone'];

    if($password = $cpass){
    $checkq = mysqli_query($con,"SELECT * FROM users WHERE username = '$username' AND email = '$email'");
    if(mysqli_num_rows($checkq) > 0){
      $msg = "Username or Email Allready taken! _danger";
    }
    else{
      if($name == "" || $username == "" || $email == "" || $password = ""){
        $msg = "Please! Fill all the fields! _danger";
      }
      else{
        $password = password_hash($password,PASSWORD_DEFAULT);
        if($refral == ""){
          $regq = mysqli_query($con,"INSERT INTO `users`(`username`, `name`, `email`,`phone`, `password`) VALUES ('$username','$name','$email','$phone','$password')");
        }
        else{
          $refcheck = mysqli_query($con,"SELECT * FROM users WHERE username = '$refral'");
          if(mysqli_num_rows($refcheck)>0){
            $refrow = mysqli_fetch_assoc($refcheck);
            $indirect = $refrow['refral'];
            $refpblnc = $refrowp['balance'];
            if($indirect == ""){
                $regq = mysqli_query($con,"INSERT INTO `users`(`username`, `name`, `email`, `phone`, `password`,`refral`) VALUES ('$username','$name','$email','$phone','$password','$refral')");
            }
            else{
                $regq = mysqli_query($con,"INSERT INTO `users`(`username`, `name`, `email`, `phone`, `password`,`refral`,`indirect`) VALUES ('$username','$name','$email','$phone','$password','$refral','$indirect')");
            }
          }
          else{
            $msg = "Invalid Refral! _danger";
          }
        }
        if($regq){
          
            $msg = "Account Created Successfully! _success";
            $_SESSION['user'] = $username;
            ?>
            <script>location.replace('user/index.php');</script>
            <?php
        }
      }
    }
  }
  else{
    $msg = "Password do not match! _danger";
  }

  }


  ?>

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Register</h2>
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="register.php" enctype="multipart/form-data" method="post">
          <?php
            if($msg != ""){
              $m = explode('_',$msg);
              if($m[1] == "danger"){
                echo "<h6 style='color: red;' >".$m[0]."</h6>";
              }
              else {
                echo "<h6 style='color: green;' >".$m[0]."</h6>";
              }
            }
          ?>
            <div class="row">
              <div class="col-lg-6">
                <fieldset>
                  <input type="text" name="name" id="name" placeholder="Name" autocomplete="off" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="text" name="username" id="surname" placeholder="Username" autocomplete="off" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="email" name="email" id="name" placeholder="Email" autocomplete="off" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="number" name="phone" id="surname" placeholder="Phone Number" autocomplete="off" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <?php
                  if(isset($_GET['refral'])){
                    $refral = $_GET['refral'];
                  ?>
                  <input type="text" name="refral" readonly value="<?= $refral?>" placeholder="Refral" autocomplete="off">
                  <?php
                  }else{
                  ?>
                  <input type="text" name="refral"  placeholder="Refral" autocomplete="off">
                  <?php
                  }
                  ?>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="password" name="password"  placeholder="Password" autocomplete="off" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="password" name="cpassword"  placeholder="Confirm Password" autocomplete="off" required>
                </fieldset>
              </div>
              <div class="col-lg-12 text-end">
                <fieldset>
                  <button type="submit" name="register" id="form-submit" class="main-button ">Register</button>
                </fieldset>
              </div>
              <div class="col-lg-12" >
                <p>Allready have an Account? <a href="login.php" >Login</a></p>
              </div>
            </div>
            <div class="contact-dec">
              <img src="assets/images/contact-decoration.png" alt="">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  include "inc/footer.php";
  ?>
</body>
</html>