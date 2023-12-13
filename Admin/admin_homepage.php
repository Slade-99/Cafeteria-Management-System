<?php

$id=$_GET['id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Security & Privacy</title>
      <link rel="stylesheet" href="./admin.css">
</head>
<body>
      <header>
            <nav class="navigation">
                  <a href="../index.php"> Logout</a>

            </nav>
      </header>

      <div class="container">
            <h1>Admin Use Only</h1>
            <div class="row">
                  <div class="create" onclick='redirectToPage1()'>
                        <h2>Create Membership</h2>
                        <p>Click Here to create membership ID for specific users</p>
                  </div>
                  <div class="update" onclick='redirectToPage6()'>
                        <h2>Update/Delete</h2>
                        <p>Update or Delete information of other users</p>
                  </div>
          
                  <div class="paymentStatus" onclick='redirectToPage4()'>
                        <h2>Due Payment Status</h2>
                        <p>Check due payments of faculty or students</p>
                  </div>
                  <div class="billstokens" onclick='redirectToPage5()'>
                        <h2>Bills and Tokens</h2>
                        <p>Click here to take order and generate bills</p>
                  </div>
                  <div class="cafeMenu" onclick='redirectToPage2()'>
                        <h2>Update Menu</h2>
                        <p>Click here to bring changes in the menu</p>
                  </div>
                  <div class="cafeMenu" onclick='redirectToPage3()'>
                        <h2>Cafeteria Insider</h2>
                        <p>Click here to check the reports and analysis</p>
                  </div>
            </div>



      </div>

      <script>
            var jsVariable = <?php echo json_encode($id); ?>;
    // JavaScript function to handle the redirection
    function redirectToPage1() {
      // Change the URL to the desired destination
      window.location.href = './Create_Membership/base.php?id='+jsVariable; // Replace 'https://example.com' with your actual URL
    }
    function redirectToPage2() {
      // Change the URL to the desired destination
      window.location.href = './Update_Menu/update_menu.php?id='+jsVariable; // Replace 'https://example.com' with your actual URL
    }
    function redirectToPage3(){

      window.location.href = './Cafeteria_Insider/base.php?id='+jsVariable; // Replace 'https://example.com' with your actual URL

    }
    function redirectToPage4(){

window.location.href = './Due_Status/Inventory.php?id='+jsVariable; // Replace 'https://example.com' with your actual URL

}
function redirectToPage5(){

window.location.href = './Bills_Tokens/billing.php?id='+jsVariable; // Replace 'https://example.com' with your actual URL

}
function redirectToPage6(){

window.location.href = './Update_Delete/information_update.php?id='+jsVariable; // Replace 'https://example.com' with your actual URL

}

  </script>
      
</body>
</html>

