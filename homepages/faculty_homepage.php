<?php
include "..\dbconnect.php";
$id = $_GET['id'];
$sql = "SELECT * from customer where Membership_ID = '$id'";
            $result = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_assoc($result);

            $due = $row['Due'];
            



?>


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
   <script>

var myDictionary = {};






      var total = 0;
  function increaseQuantity(itemId) {
    var quantityElement = document.getElementById('quantity_' + itemId);
    var currentQuantity = parseInt(quantityElement.innerText, 10);
    

    var row = quantityElement.closest('tr');
    if (row) {
    var cells = row.cells;

    // Calculate the indices of the two cells previous
    var currentCellIndex = Array.from(cells).indexOf(quantityElement.parentNode);
    var firstPreviousCellIndex = currentCellIndex - 1;
    var secondPreviousCellIndex = currentCellIndex - 2;
    var thirdPreviousCellIndex = currentCellIndex - 3;

    // Extract information from the two cells previous
    var firstPreviousColumnValue = cells[firstPreviousCellIndex].innerText;
    var secondPreviousColumnValue = cells[secondPreviousCellIndex].innerText;
    var thirdPreviousColumnValue = cells[thirdPreviousCellIndex].innerText;

}
      
      if(currentQuantity<secondPreviousColumnValue){
      quantityElement.innerText = currentQuantity + 1;

      var value = parseInt(firstPreviousColumnValue, 10);
      
      total = total + value;
      
      myDictionary[thirdPreviousColumnValue] = currentQuantity+1;
 
      document.getElementById('output').innerHTML = total;


     

}






}

  function decreaseQuantity(itemId) {
    var quantityElement = document.getElementById('quantity_' + itemId);
    var currentQuantity = parseInt(quantityElement.innerText, 10);
    if (currentQuantity > 0) {
      quantityElement.innerText = currentQuantity - 1;
    }
    var row = quantityElement.closest('tr');
    if (row) {
    var cells = row.cells;

    // Calculate the indices of the two cells previous
    var currentCellIndex = Array.from(cells).indexOf(quantityElement.parentNode);
    var firstPreviousCellIndex = currentCellIndex - 1;
    var secondPreviousCellIndex = currentCellIndex - 2;
    var thirdPreviousCellIndex = currentCellIndex - 3;

    // Extract information from the two cells previous
    var firstPreviousColumnValue = cells[firstPreviousCellIndex].innerText;
    var secondPreviousColumnValue = cells[secondPreviousCellIndex].innerText;
    var thirdPreviousColumnValue = cells[thirdPreviousCellIndex].innerText;


}
      var value = parseInt(firstPreviousColumnValue, 10);
      if(total - value >=0 && currentQuantity>0){
      total = total - value;}
      myDictionary[thirdPreviousColumnValue] = currentQuantity-1;
      document.getElementById('output').innerHTML = total;
      


// Call the function with the sample dictionary


  }




  var resultString = '';

  function concatenatePositiveValues() {
      
      
    for (var key in myDictionary) {
        if (myDictionary.hasOwnProperty(key) && myDictionary[key] > 0) {
            resultString +=  myDictionary[key] + 'x ' + key + ', ';
        }
    }

    // Remove the trailing comma and space
    resultString = resultString.slice(0, -2);

    document.getElementById('output').innerHTML = total;
}



function sendVariables(){
var xhr = new XMLHttpRequest();
var form = document.createElement("form");
            form.method = "post";
            form.action = window.location.href; // Same page URL
            form.style.display = "none";

            // Add parameters as hidden fields
            var params = {
                key1: resultString,
                key2: total,
                key3: "Due"
                
                // Add more key-value pairs as needed
            };

            for (var key in params) {
                if (params.hasOwnProperty(key)) {
                    var input = document.createElement("input");
                    input.type = "hidden";
                    input.name = key;
                    input.value = params[key];
                    form.appendChild(input);
                }
            }

            document.body.appendChild(form);
            form.submit();
        }
    

</script>
   



    <div class="value-box">
      
      <strong>Faculty Due</strong> <br><?php echo $due ?>

    </div>

    <div class="value-box-total" >
    <strong >Total: </strong> 
      <strong id='output'> </strong> 

    </div>

    <button type = 'submit' class="styled-button">Proceed to payment</button>
    <button type = 'submit' method='post' class="styled-button_2" onclick="concatenatePositiveValues() ; sendVariables()">Order on due</button>

 
      
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

