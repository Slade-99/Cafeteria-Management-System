<?php





if($_SERVER["REQUEST_METHOD"]=="POST"){

    include '../../dbconnect.php';
   
    $Name = $_POST["name"];
    

    $Password = $_POST["password"];
    $Address = $_POST["address"];
    $Phone = $_POST["phone"];
    $Salary = intval($_POST["salary"],10);
    $Type = "Admin";
  
    $Off_day = 0;
    
    $id = $_POST['fixed_value'];
   
    


    

    


    



        $counting = "Select count(*) from employee where type='admin'";
        $result_1 = mysqli_query($conn , $counting);
    
    
        $row = mysqli_fetch_assoc($result_1);

        $new_record = $row['count(*)'] +1 ;

        if($new_record<10){
            $Membeship_ID='E00'.$new_record;
        }elseif($new_record<100){
            $Membeship_ID='E0'.$new_record;
        }else{
            $Membeship_ID='E'.$new_record;
        }

    
    
        
    
        $insertion = "Insert into employee values ('$Membeship_ID','$Name','$Password','$Address','$Phone','$Type',$Salary,$Off_day)";


        $result = mysqli_query($conn , $insertion);

        
        header("location: ../admin_homepage.php?id=".$id." ");
        
      
    }
    
    
    

    






?>













<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Faculty Signup</title>
      <link rel="stylesheet" href="faculty_profile.css">
</head>
<body>


      <div class="wrapper">
      
            <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
            <div class="from-box login">
            <h1>Signup</h1>
            
            <form action="admin_profile.php" method="post">
     
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
                        <input type="address" class="form-control" id="address" name="address">
                        <label for="address">Address</label>
                        
                  </div>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="phone" class="form-control" id="phone" name="phone">
                        <label for="phone">phone</label>
                        
                  </div>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="salary" class="form-control" id="salary" name="salary">
                        <label for="salary">Salary</label>
                        
                  </div>
                  <input type="hidden" name="fixed_value" value="<?php if($_SERVER["REQUEST_METHOD"]=="GET"){echo $_GET['id'];}?>">
               
                  <button type="submit" class="btn" >Signup</button>
            
            </div>
            </form>
      </div>



      <script src="/script.js"></script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
