<?php
include '../dbconnect.php';
$obtained = array();
$description = $_GET['resultString'];
$id=$_GET['id'];

    //updating the stock 
      $itemList = explode(',', $description);
      foreach ($itemList as $item) {
          $array=explode('x', $item);
          $quantity=$array[0];
          // Converting string to integer using intval
          $quantity = intval($quantity);
          $name=substr($array[1], 1);
          $temp="select Quantity from stock where Item_name='$name';";
          $result_1 = mysqli_query($conn , $temp);
          $row = mysqli_fetch_assoc($result_1);
          $prev_quantity= $row['Quantity'];
          echo $quantity;
          $new=$prev_quantity+$quantity;
      }
          $temp="Update stock set Quantity = '$new' where Item_name='$name';";
          $result_1 = mysqli_query($conn , $temp);
      



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Finalize</title>
    <link rel="stylesheet" href="cook.css">
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
                window.location.href = './cook_homepage.php?id='+jsVariable1;
            }, 1500); // 5000 milliseconds = 5 seconds
        })();

        
    </script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>




















