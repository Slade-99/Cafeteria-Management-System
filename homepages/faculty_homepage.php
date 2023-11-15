<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Faculty Homepage</title>
      <link rel="stylesheet" href="f.css">
</head>
<body>

      <main class="table">
        <section class="table__header">
            <h1>Menu</h1>
           

        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Item </th>
                        <th> Quantity </th>
                        <th> Price </th>
                        <th> Add Item </th>
                        
                    </tr>
                </thead>
                <tbody>
  

                    <?php
                    include '../dbconnect.php';
    
                    $sql = "Select * from menu;";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)){
                    
                        $item_name = $row['Name'];
                        $quantity = $row['Quantity'];
                        $price = $row['Price'];
                        echo "<tr>
                        <td>". $item_name."</td> 
                        <td>". $quantity."</td>
                        <td>". $price ."</td>
                        <td><button type='submit' class='btn btn-primary'>Add to Cart</button><td>
                        </tr>";
                    
                    
                    
                    }



?>
    
     
      
      
       
       
                </tbody>
            </table>
        </section>
    </main>




      <!--
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

-->

      <script src="../script.js"></script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>