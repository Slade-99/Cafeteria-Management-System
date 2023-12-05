<?php
$id= $_GET['id'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Membership profiles</title>
    <link rel="stylesheet" href="base.css">
    <div class="containerx">
            
            <div class="row">
                  
                  <div class="delete" onclick="redirectToPage1()">
                        <h2>Food Trend</h2>
                        
                  </div>
                  <div class="delete">
                        <h2>Overview of Service</h2>
                        
                  </div>

    
             
            </div>



      </div>
 
      <script>
        var jsVariable = <?php echo json_encode($id); ?>;
    // JavaScript function to handle the redirection
    function redirectToPage1() {
      // Change the URL to the desired destination
      window.location.href = './piechart_histogram.php?id='+jsVariable; // Replace 'https://example.com' with your actual URL
    }
    /*function redirectToPage2() {
      // Change the URL to the desired destination
      window.location.href = './student_profile.php?id='+jsVariable; // Replace 'https://example.com' with your actual URL
    }*/
    
  </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>




















