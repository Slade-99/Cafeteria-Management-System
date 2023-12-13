<?php
include "..\..\dbconnect.php";
$id = $_GET['id'];
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Billing Page</title>
     
      <link rel="stylesheet" href="billing.css">
</head>
<body>
<header>
            <nav class="navigation">
                  <a href="../../index.php"> Logout</a>

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
                    include '../../dbconnect.php';
    
                    $sql = "Select * from menu;";
                    $result = mysqli_query($conn, $sql);
                    $temp = 1;
                    while ($row = mysqli_fetch_assoc($result)){
                        
                        $item_name = $row['Name'];
                        $quantity = $row['Quantity'];
                        $price = ($row['Price']);
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

    <main class="table2"> 
        <section class="table__header2">
            <h1>Provide details</h1>
        </section>
        <section class="table__body2">
            <table>
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Mode of Payment </th>

        
              
                        
                    </tr>
                </thead>
                <tbody>
                    <tr><td><input type="texty" id='p1' placeholder=""></td>
                    <td><input type="texty" id='p2' placeholder=""></td>
            
               
                
                
                </tr>
                

       
                </tbody>
            </table>


        </section>
    </main>


    <div class="value-box-total" >
    <strong >Total: </strong> 
      <strong id='output'> </strong> 
</div>       
    


    
    

<button type = 'submit' class='styled-button' onclick='concatenatePositiveValues() ;redirectToPage()' >Proceed to payment</button>


   
        <script src="./billing.js"></script>
        <script>
        // Use PHP echo to output the PHP variable as a JavaScript variable
        var jsVariable = <?php echo json_encode($_GET['id']); ?>;
        // Now you can use jsVariable in your external JavaScript file
    </script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>






