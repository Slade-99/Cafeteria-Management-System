

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Finalize</title>
    <link rel="stylesheet" href="faculty.css">
  </head>
  <div class="containerx">
            
            <div class="row">
                  
                  <div class="delete">
                        <h2>Please wait. Your order is being processed</h2>
                        
                  </div>
     
             
            </div>



      </div>


	<?php 
    include "..\dbconnect.php";
    $total = $_GET['total'];
    $description = $_GET['resultString'];
    $id=$_GET['id'];
    $status=$_GET['status'];
    $currentDateTime = date("Y-m-d H:i:s");
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $Admin_ID = "E001";
    $counting = "select count(*) from sales;";
    $result_1 = mysqli_query($conn , $counting);
    $row = mysqli_fetch_assoc($result_1);
    $new = $row['count(*)'] +1;
    $Token;
    if($new<10){
    $Token =  "T00" . $new;}
    elseif($new<100){
          $Token =  "T0" . $new;
    }else{
          $Token =  "T" . $new;
    }


if($status=='Due'){
       //updating the sales table
       $temp="Insert into Sales values('$Token','$date','$time','$status','$total','$description','E001','$id')";
       $result_1 = mysqli_query($conn , $temp);
       
 //updating the customer table;
$temp="select Due from customer where Membership_ID='$id';";
$result_1 = mysqli_query($conn , $temp);
$row = mysqli_fetch_assoc($result_1);
$prev_due= $row['Due'];
$new=$prev_due+$total;
$temp="Update Customer set Due = '$new' where Membership_ID='$id';";
$result_1 = mysqli_query($conn , $temp);

 //updating the menu table
 $itemList = explode(',', $description);
 foreach ($itemList as $item) {
     $array=explode('x', $item);
     $quantity=$array[0];
     // Convert string to integer using intval
     $quantity = intval($quantity);
     $name=substr($array[1], 1);
     $temp="select Quantity from menu where Name='$name';";
     $result_1 = mysqli_query($conn , $temp);
     $row = mysqli_fetch_assoc($result_1);
     $prev_quantity= $row['Quantity'];
     $new=$prev_quantity-$quantity;
     $temp="Update menu set Quantity = '$new' where Name='$name';";
     $result_1 = mysqli_query($conn , $temp);
 }
}else if($status=='Paid2'){
  
  $temp="Insert into Sales values('$Token','$date','$time','Paid','$total','$description','E001','$id')";
  $result_1 = mysqli_query($conn , $temp);

  $counting = "select count(*) from payment_gateway;";
  $result_1 = mysqli_query($conn , $counting);
  $row = mysqli_fetch_assoc($result_1);
  $new = $row['count(*)'] +1;
  $Tran_id = "TSD000".$new;



//updating the payment_Gateway table;
$temp="Insert into payment_gateway values('$Tran_id','$status','$date','$time','$Token')";
$result_1 = mysqli_query($conn , $temp);




  //updating the menu table
$itemList = explode(',', $description);
foreach ($itemList as $item) {
   $array=explode('x', $item);
   $quantity=$array[0];
   // Convert string to integer using intval
   $quantity = intval($quantity);
   $name=substr($array[1], 1);
   $temp="select Quantity from menu where Name='$name';";
   $result_1 = mysqli_query($conn , $temp);
   $row = mysqli_fetch_assoc($result_1);
   $prev_quantity= $row['Quantity'];
   $new=$prev_quantity-$quantity;
   $temp="Update menu set Quantity = '$new' where Name='$name';";
   $result_1 = mysqli_query($conn , $temp);
}

}

else{

$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("ashat6439aed07e661");
$store_passwd=urlencode("ashat6439aed07e661@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

    $arrayString=  explode(" ", $tran_date);
	$date = $arrayString[0];
	$time = $arrayString[1];


              
              
          
              //updating the sales table
              $temp="Insert into Sales values('$Token','$date','$time','Paid','$total','$description','E001','$id')";
              $result_1 = mysqli_query($conn , $temp);
              $bank_tran_id = "TSD".$bank_tran_id;
            //updating the Payment_Gateway table
            $temp="Insert into Payment_Gateway values('$bank_tran_id','$card_type','$date','$time','$Token')";
            $result_1 = mysqli_query($conn , $temp);



        //updating the menu table
        $itemList = explode(',', $description);
        foreach ($itemList as $item) {
            $array=explode('x', $item);
            $quantity=$array[0];
            // Convert string to integer using intval
            $quantity = intval($quantity);
            $name=substr($array[1], 1);
            $temp="select Quantity from menu where Name='$name';";
            $result_1 = mysqli_query($conn , $temp);
            $row = mysqli_fetch_assoc($result_1);
            $prev_quantity= $row['Quantity'];
            $new=$prev_quantity-$quantity;
            $temp="Update menu set Quantity = '$new' where Name='$name';";
            $result_1 = mysqli_query($conn , $temp);
        }
        
      }
    









} 


?>
  <script>
    var jsVariable1 = "<?php echo $id; ?>";
    var jsVariable2 = "<?php echo $Token; ?>";
        // Self-invoking function to execute the setTimeout immediately
        
        
        (function() {
            setTimeout(function() {
                window.location.href = './faculty_homepage.php?id='+jsVariable1+'&Token='+jsVariable2+'&exist=Y';
            }, 1500); // 5000 milliseconds = 5 seconds
        })();

        
    </script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
