<?php
include "..\dbconnect.php";
$id = $_GET['id'];
$sql = "SELECT * from customer where Membership_ID = '$id'";
            $result = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_assoc($result);

            $due = $row['Due'];         

$exist = $_GET['exist'];
if($exist=='Y'){
    $Token=$_GET['Token'];
    echo '<div class="custom-alert">
    <span>Success! Your order token number is.'.$Token.' &nbsp &nbsp Please close this message after you have received your order.   &nbsp &nbsp    Thank you</span>
    <button class="close-btn" onclick="dismissAlert()">×</button>
  </div>';
}
if($exist=='Feedback'){
  
  echo '<div class="custom-alert">
  <span>Success! Your feedback has been submitted.  &nbsp    Thank you.</span>
  <button class="close-btn" onclick="dismissAlert()">×</button>
</div>';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Faculty Homepage</title>
     
      <link rel="stylesheet" href="faculty.css">
</head>
<body>
<header>
            <nav class="navigation">
                  <a href="../index.php"> Logout</a>

            </nav>
      </header>
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
                        <th> Purchase Quantity</th>
                        
                    </tr>
                </thead>
                <tbody>
  

                    <?php
                    include '../dbconnect.php';
    
                    $sql = "Select * from menu;";
                    $result = mysqli_query($conn, $sql);
                    $temp = 1;
                    while ($row = mysqli_fetch_assoc($result)){
                        
                        $item_name = $row['Name'];
                        $quantity = $row['Quantity'];
                        $price = ($row['Price'])*(75/100);
                        $price = round($price);
                        echo "<script>";
                        echo "addToDictionary(".$item_name.");";
                        echo "</script>";
                   
                        echo "
                        <tr>
                        <td>". $item_name."</td> 
                        <td>". $quantity."</td>
                        <td>". $price ."</td>
                        <td>

                        <button type='button' onclick='decreaseQuantity($temp)'>-</button>
                        <span  id='quantity_".$temp."'>0</span>
                        <button type='button' onclick='increaseQuantity($temp)'>+</button>
                        </td>
                        </tr>";
                        

                        
                        $temp = $temp +1;
                    
                    }
?>
       
                </tbody>
            </table>


        </section>
    </main>
    <p id="output1"></p>



    <div class="value-box">
      
      <strong>Faculty Due</strong> <br><?php echo $due ?>

    </div>

    <div class="value-box-total" >
    <strong >Total: </strong> 
      <strong id='output'> </strong> 

    </div>
    
    

<button type = 'submit' class='styled-button' onclick='concatenatePositiveValues() ;redirectToPage()' >Proceed to payment</button>
 <button type = 'submit' class='styled-button_2' onclick='concatenatePositiveValues() ;redirectToPage2()'>Order on due</button>
 <button type = 'submit' class='styled-button_3' onclick='redirectToPage3()'> Submit a Feedback</button>
 

        <script src="./faculty_script.js"></script>
        <script>
        // Use PHP echo to output the PHP variable as a JavaScript variable
        var jsVariable = <?php echo json_encode($id); ?>;
        // Now you can use jsVariable in your external JavaScript file
    </script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>






