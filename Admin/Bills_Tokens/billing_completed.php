

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Finalize</title>
    <link rel="stylesheet" href="billing.css">
  </head>
  <div class="containerx">
            
            <div class="row">
                  
                  <div class="delete">
                        <h2>Please wait. Your order is being processed</h2>
                        
                  </div>
     
             
            </div>



      </div>


	<?php 
    include "..\..\dbconnect.php";
    $total = $_GET['total'];
    $description = $_GET['resultString'];
    $Admin_ID=$_GET['id'];
    $status=$_GET['status'];
    $currentDateTime = date("Y-m-d H:i:s");
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $cus_id = $_GET['cus_id'];
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
       $temp="Insert into Sales values('$Token','$date','$time','$status','$total','$description','$Admin_ID','$cus_id')";
       $result_1 = mysqli_query($conn , $temp);
       
 //updating the customer table;
$temp="select Due from customer where Membership_ID='$cus_id';";
$result_1 = mysqli_query($conn , $temp);
$row = mysqli_fetch_assoc($result_1);
$prev_due= $row['Due'];
$new=$prev_due+$total;
$temp="Update Customer set Due = '$new' where Membership_ID='$cus_id';";
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
}else{

    $temp="Insert into Sales values('$Token','$date','$time','Paid','$total','$description','$Admin_ID','$cus_id')";
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

include('../../smtp/PHPMailerAutoload.php');


function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "azwad.aziz2002@gmail.com";
	$mail->Password = "vsrx ciyp bcob agzb";
	$mail->SetFrom("azwad.aziz2002@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
$query = "select Email from customer where Membership_ID='$cus_id';";
$result_1 = mysqli_query($conn , $query);
$row = mysqli_fetch_assoc($result_1);
$email_id = $row['Email'];

$html = "Thank you for using our service. Your Order token is ".$Token;
echo smtp_mailer($email_id,'BracU Cafeteria Order Token',$html);







} 


?>
  <script>
    var jsVariable1 = "<?php echo $Admin_ID; ?>";

        // Self-invoking function to execute the setTimeout immediately
        
       
        (function() {
            setTimeout(function() {
                window.location.href = './billing.php?id='+jsVariable1;
            }, 1500); // 5000 milliseconds = 5 seconds
        })();

    
    </script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
