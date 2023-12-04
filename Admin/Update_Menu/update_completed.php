<?php
include '../../dbconnect.php';
$obtained = array();
$description = $_GET['resultString'];
$description2 = $_GET['resultString2'];
$id=$_GET['id'];



    if(strlen($description)>0){
      $itemList = explode(',', $description);
      array_pop($itemList);
      foreach ($itemList as $item) {
          $array=explode('x', $item);
          $quantity=$array[0];
         
          $name= $array[1];
          
          // Converting string to integer using intval
          $quantity = intval($quantity);
          
          $temp="select Quantity from menu where Name='$name';";
          $result_1 = mysqli_query($conn , $temp);
          $row = mysqli_fetch_assoc($result_1);
          $prev_quantity= $row['Quantity'];
          
          $new=$prev_quantity+$quantity;
          $temp="Update menu set Quantity = '$new' where Name='$name';";
          $result_1 = mysqli_query($conn , $temp);
      
        }
         
      
    }
    if(strlen($description2)>0){
      $itemList = explode(',', $description2);
      array_pop($itemList);
      foreach ($itemList as $item) {
        
          $new=explode('x', $item);
          $price = $new[0];
          $name = $new[1];
          
          
          // Converting string to integer using intval
          $temp="Update menu set Price = $price where name='$name';";
          $result_1 = mysqli_query($conn , $temp);

      }
   
    }

$exist = $_GET['exist'];
if($exist=='True'){
  $name = $_GET['name'];
  $price = $_GET['price'];
  $factor = $_GET['factor'];

  $insertion = "Insert into menu values ('$name',0,'$price','$factor',0)";
  $result_1 = mysqli_query($conn , $insertion);
}
if($exist=='Nottrue'){
  $name = $_GET['name'];


  $insertion = "Delete from menu where Name='$name'";
  $result_1 = mysqli_query($conn , $insertion);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Finalize</title>
    <link rel="stylesheet" href="update_menu.css">
    <div class="containerx">
            
            <div class="row">
                  
                  <div class="delete">
                        <h2>Please wait .  &nbsp   Redirecting in a second</h2>
                        
                  </div>
     
             
            </div>



      </div>
 
  <script>
    var jsVariable1 = "<?php echo $id; ?>";
  
        // Self-invoking function to execute the setTimeout immediately
        
        
        (function() {
            setTimeout(function() {
                window.location.href = './update_menu.php?id='+jsVariable1;
            }, 1500); // 1500 milliseconds = 5 seconds
        })();

        
    </script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>




















