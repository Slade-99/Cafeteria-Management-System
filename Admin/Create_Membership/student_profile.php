<?php





if($_SERVER["REQUEST_METHOD"]=="POST"){

    include '../../dbconnect.php';
   
    $Name = $_POST["name"];
    
    $Email = $_POST["email"];
    $Password = $_POST["password"];
    $Address = $_POST["address"];
    $Phone = $_POST["phone"];
    $Due = 0;
    $Type = "Student";
    $Fines = 0;
    $Facult_type = "None";
    
    
    $id = $_POST['fixed_value'];
    
    

    

    
    
    

    



        $counting = "Select count(*) from customer where type='student'";
        $result_1 = mysqli_query($conn , $counting);
    
    
        $row = mysqli_fetch_assoc($result_1);

        $new_record = $row['count(*)'] +1 ;

        if($new_record<10){
            $Membeship_ID='S00'.$new_record;
        }elseif($new_record<100){
            $Membeship_ID='S0'.$new_record;
        }else{
            $Membeship_ID='S'.$new_record;
        }

    
    
        $user = "E001";
    
        $insertion = "Insert into customer values ('$Membeship_ID','$Name','$Password','$Email','$Address','$Phone',$Due,'$Type',$Fines,'$Facult_type')";


        $result = mysqli_query($conn , $insertion);

        
        
        
        
      
   //EMailing

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
   
   
   $html = "Your Account has been successfully created. Your Membership ID is ".$Membeship_ID;
   echo smtp_mailer($Email,'BracU Cafeteria Account Creation',$html);
   
   
   
           
           header("location: ../admin_homepage.php?id=".$user." ");
           
         
       
       
       
       
   
       
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
      }
    
    
    

    






?>













<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Student Signup</title>
      <link rel="stylesheet" href="faculty_profile.css">
</head>
<body>
<header>
            <nav class="navigation">
                  <a href="../../index.php"> Logout</a>

            </nav>
      </header>

      <div class="wrapper">
      
            <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
            <div class="from-box login">
            <h1>Signup</h1>
            
            <form action="student_profile.php" method="post">
     
                  <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="name" class="form-control" id="name" name="name">
                        <label for="name">Name</label>
                        
                  </div>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="text" class="form-control" id="password" name="password">
                        <label for="password">Password</label>
                        
                  </div>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="email" class="form-control" id="email" name="email">
                        <label for="email">Email</label>
                        
                  </div>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="address" class="form-control" id="address" name="address">
                        <label for="address">Address</label>
                        
                  </div>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="phone" class="form-control" id="phone" name="phone">
                        <label for="phone">phone</label>
                        
                  </div>
                  <input type="hidden" name="fixed_value" value="<?php if($_SERVER["REQUEST_METHOD"]=="GET"){echo $_GET['id'];}?>">
               
                  <button type="submit" class="btn">Signup</button>
            
            </div>
            </form>
      </div>



      <script src="/script.js"></script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
