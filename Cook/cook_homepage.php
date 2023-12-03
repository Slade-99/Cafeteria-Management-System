
<?php
include "..\dbconnect.php";
$id = $_GET['id'];
$sql = "SELECT * from customer where Membership_ID = '$id'";
            $result = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cook Homepage</title>
      <link rel="stylesheet" href="cook.css">
</head>
<body>


      <main class="table">
        <section class="table__header">
            <h1>Available Stock</h1>
           

        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Item </th>
                        <th> Quantity </th>
                        <th> Purchase Quantity</th>
                        <th> Low On Stock </th>
                        
                    </tr>
                </thead>
                <tbody>
  

                    <?php
                    include '../dbconnect.php';
    
                    $sql = "Select * from stock;";
                    $result = mysqli_query($conn, $sql);
                    $temp = 1;
                    while ($row = mysqli_fetch_assoc($result)){
                        
                        $item_name = $row['Item_name'];
                        $quantity = $row['Quantity'];
                        echo "<script>";
                        echo "addToDictionary(".$item_name.");";
                        echo "</script>";
                   
                        echo "
                        <tr>
                        <td>". $item_name."</td> 
                        <td>". $quantity."</td>
                        <td>
                        <button type='button' onclick='decreaseQuantity($temp)'>-</button>
                        <span  id='quantity_".$temp."'>0</span>
                        <button type='button' onclick='increaseQuantity($temp)'>+</button>
                        </td>";
                        
                        if($quantity < 5){
                            echo"
                            <td><button class='blinking-button'>Alert</button></td>
                            </tr>";
                        }
                        else{
                            echo"
                            <td>   </td></tr>";
                        }

                        
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

    // Extract information from the two cells previous
    var firstPreviousColumnValue = cells[firstPreviousCellIndex].innerText;
    var secondPreviousColumnValue = cells[secondPreviousCellIndex].innerText;
}
      
     
      quantityElement.innerText = currentQuantity + 1;
      myDictionary[secondPreviousColumnValue] = currentQuantity+1;
 
     


}

  function decreaseQuantity(itemId) {
    var quantityElement = document.getElementById('quantity_' + itemId);
    var currentQuantity = parseInt(quantityElement.innerText, 10);
    
    var row = quantityElement.closest('tr');
    if (row) {
    var cells = row.cells;

    // Calculate the indices of the two cells previous
    var currentCellIndex = Array.from(cells).indexOf(quantityElement.parentNode);
    var firstPreviousCellIndex = currentCellIndex - 1;
    var secondPreviousCellIndex = currentCellIndex - 2;
    
    // Extract information from the two cells previous
    var firstPreviousColumnValue = parseInt(cells[firstPreviousCellIndex].innerText,10);
    var secondPreviousColumnValue = cells[secondPreviousCellIndex].innerText;

}
    if(  (firstPreviousColumnValue+currentQuantity)>0 ){
        quantityElement.innerText = currentQuantity - 1;
        myDictionary[secondPreviousColumnValue] = currentQuantity-1;
    }
      
  }




  var resultString = '';

  function concatenatePositiveValues() {
      
      
    for (var key in myDictionary) {
        if (myDictionary.hasOwnProperty(key) ) {
            resultString +=  myDictionary[key] + 'x ' + key + ', ';
        }
    }

    // Remove the trailing comma and space
    resultString = resultString.slice(0, -2);
}


/*
function sendVariables(){
var xhr = new XMLHttpRequest();
var form = document.createElement("form");
            form.method = "post";
            form.action = window.location.href; 
            form.style.display = "none";

            // passing parameters for using it in php
            var params = {
                key1: resultString
                
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
        }*/
        var jsVariable = <?php echo json_encode($id); ?>;
        function redirectToPage2() {

         window.location.href = './cook_stock_update.php?id='+jsVariable+'&resultString='+resultString;

        }
</script>
   



    <button type = 'submit' method='post' class="styled-button" onclick="concatenatePositiveValues() ; redirectToPage2()">Update Stock</button>
    
      
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>



        
      
      



