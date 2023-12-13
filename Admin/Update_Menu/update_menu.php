


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Update Menu</title>
     
      <link rel="stylesheet" href="update_menu.css">
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
                        <th> Price </th>
                        <th> Quantity </th>
                        
                        <th> New Quantity</th>
                        <th> New Price</th>
                        
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
                        $price = $row['Price'];
                        $quantity = $row['Quantity'];
                        
                        
                        echo "<script>";
                        echo "addToDictionary(".$item_name.");";
                        echo "</script>";
                   
                        echo "
                        <tr>
                        <td>". $item_name."</td> 
                        <td>". $price."</td> 
                        <td>". $quantity."</td>
                        
                        <td>

                        <button type='button' onclick='decreaseQuantity($temp)'>-</button>
                        <span  id='quantity_".$temp."'>0</span>
                        <button type='button' onclick='increaseQuantity($temp)'>+</button>
                        </td>

                        <td>  <input type='textr' id=".$temp." data-custom-attribute=".$temp." oninput='handleInput(this.value,this.dataset.customAttribute)' placeholder=''>  </td>
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
            <h1>Add/Delete an Item</h1>
        </section>
        <section class="table__body2">
            <table>
                <thead>
                    <tr>
                        <th> Item Name </th>
                        <th> Price </th>
                        <th> Health Factor </th>
              
                        
                    </tr>
                </thead>
                <tbody>
                    <tr><td><input type="texty" id='p1' placeholder=""></td>
                    <td><input type="texty" id='p2' placeholder=""></td>
                    <td><input type="texty"  id='p3' placeholder=""></td>
                
                
                </tr>
                

       
                </tbody>
            </table>


        </section>
    </main>
    <p id="output1"></p>




    

    
    


 <button type = 'submit' class='styled-button_2' onclick='concatenatePositiveValues(); redirectToPage2()'>Approve</button>
 <button type = 'submit' class='styled-button_3' onclick='redirectToPage3()'> Insert Item</button>
 <button type = 'submit' class='styled-button' onclick='redirectToPage()' >Delete Item</button>
        
 
 
 <script src="./update_menu_script.js"></script>
        <script>
        // Use PHP echo to output the PHP variable as a JavaScript variable
        var jsVariable = <?php echo json_encode($_GET['id']); ?>;
        // Now you can use jsVariable in your external JavaScript file
    </script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>






