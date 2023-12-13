<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../dbconnect.php';//dbconnect

    $id = $_POST['constantValue'];
    $rating = $_POST["rating"];
    $comments = $_POST["comments"];
      
    
      $counting = "select count(*) from feedback;";
    $result_1 = mysqli_query($conn , $counting);
    $row = mysqli_fetch_assoc($result_1);
    $new = $row['count(*)'] +1;
    

    $temp="Insert into feedback values('$new','$rating','$comments','$id')";
    $result_1 = mysqli_query($conn , $temp);
    
if($id[0]=='F'){
    header("location: ./faculty_homepage.php?id=".$id."&exist=Feedback ");}
    else{
      header("location: ./student_homepage.php?id=".$id."&exist=Feedback ");
    }

  
}
    
?>













<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Faculty Homepage</title>
      <link rel="stylesheet" href="../style.css">
</head>
<body>


      <div class="wrapper">
            <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
            <div class="from-box login">
            <h1>Feedback</h1>
            
            <form action="./feedback.php" method="post">
                  <div class="input-box">
                        <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                        <input type="ID" id="rating" name="rating" class="form-control">
                        <label for ="userid" >Rating out of 10</label>
                  </div>
                  <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="text" class="form-control" id="comments" name="comments">
                        <label for="password">Comments</label>
                        
                  </div>
                  <div>
                  <input type="hidden" name="constantValue" value=<?php echo $_GET['id']; ?> >
                  </div>
                  <button type="submit" class="btn">Submit</button>
            
            </div>
            </form>
      </div>



      <script src="/script.js"></script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
