<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include './dbconnect.php';//dbconnect
    $userid = $_POST["userid"];
    $userpassword = $_POST["userpassword"];
    
        if($userid[0] == 'F'){
            $sql = "select * from customer where Membership_ID= '$userid'  and Password='$userpassword'";
            $result = mysqli_query($conn, $sql);
            $num=mysqli_num_rows( $result );
            if ($num==1){
                  $login = true;
                  session_start();
                  $_SESSION['loggedin']= true;
                  $_SESSION['userid'] = $userid;
                  header("location: ./homepages/faculty_homepage.php?id=".$userid." ");//redirects
      
              
              }
              else{
                  $showError = "You have inserted wrong credentials.Please insert valid credentials";
              }
            
      }
        elseif($userid[0] == 'S'){
            $sql = "select * from customer where Membership_ID= '$userid'  and Password='$userpassword'";
            $result = mysqli_query($conn, $sql);
            $num=mysqli_num_rows( $result );
            if ($num==1){
                  $login = true;
                  session_start();
                  $_SESSION['loggedin']= true;
                  $_SESSION['userid'] = $userid;
                  header("location: ./homepages/student_homepage.php?id=".$userid." ");//redirects
      
              
              }
              else{
                  $showError = "You have inserted wrong credentials.Please insert valid credentials";
              }

      } elseif($userid[0] == 'E' && $userid[1]== 'C'){
            $sql = "select * from employee where Employee_ID= '$userid'  and Password='$userpassword'";
            $result = mysqli_query($conn, $sql);
            $num=mysqli_num_rows( $result );
            if ($num==1){
                  $login = true;
                  session_start();
                  $_SESSION['loggedin']= true;
                  $_SESSION['userid'] = $userid;
                  header("location: ./homepages/cook_homepage.php?id=".$userid." ");//redirects
      
              
              }
              else{
                  $showError = "You have inserted wrong credentials.Please insert valid credentials";
              }
      } else{
            $sql = "select * from employee where Employee_ID= '$userid'  and Password='$userpassword'";
            $result = mysqli_query($conn, $sql);
            $num=mysqli_num_rows( $result );
            if ($num==1){
                  $login = true;
                  session_start();
                  $_SESSION['loggedin']= true;
                  $_SESSION['userid'] = $userid;
                  header("location: ./homepages/admin_homepage.php?id=".$userid." ");//redirects
                  
              
              }
              else{
                  $showError = "You have inserted wrong credentials.Please insert valid credentials";
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
      <title>Faculty Homepage</title>
      <link rel="stylesheet" href="style.css">
</head>
<body>
      <header>
            <nav class="navigation">
                  <a href="#"> Home</a>
                  <a href="#"> About</a>
                  <a href="#"> Contact</a>
                  <button class="btnlogin-popup"> Login</button>
            </nav>
      </header>

      <div class="wrapper">
            <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
            <div class="from-box login">
            <h2>Login</h2>
            
            <form action="index.php" method="post">
                  <div class="input-box">
                        <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                        <input type="ID" id="userid" name="userid" class="form-control">
                        <label for ="userid" >ID</label>
                  </div>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="password" class="form-control" id="userpassword" name="userpassword">
                        <label for="password">Password</label>
                        
                  </div>
                  <div class="remember-forgot"
                  <label><input type="checkbox">Remember me</label>
                  <a href="#">Forgot Password?</a>
                  </div>
                  <button type="submit" class="btn">Login</button>
                  <div class="login-register">
                        <p>Don't have any account? <a href="#" class="register-link">Register</a></p>
                  </div>
            </div>
            </form>
      </div>



      <script src="/script.js"></script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>