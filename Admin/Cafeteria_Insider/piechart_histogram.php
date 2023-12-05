<?php
include "..\..\dbconnect.php";
?>



  <html>
    <head>
      <title>BRAC UNIVERSITY FOOD INSIDER</title>
      <link rel="stylesheet" href="../../style.css">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);
      
        function drawChart() {
  
          var data = google.visualization.arrayToDataTable([
            ['Food Type', 'Consumption in percentage'],
          <?php
          include '../../dbconnect.php';

          //calculation part
          $sql = "select sum(Sold_quantity) as total_sum from menu;";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $total = $row['total_sum'];//contains the total sum of all the sold quanties
          $sql = "select sum(Sold_quantity) as total_sum from menu where Health_factor='normal';";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $junk = $row['total_sum'];
          $sql = "select sum(Sold_quantity) as total_sum from menu where Health_factor='healthy';";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          $healthy = $row['total_sum'];
          $junk_output=($junk * 100)/$total;
          $healthy_output=($healthy * 100)/$total;
          echo"['HEALTHY', $healthy_output],";
          echo"['JUNK', $junk_output],";
          
          ?>
          ]);
  
          var options = {
            title: 'Healthy to Junk Ratio',
            titleTextStyle: { fontSize: 25, bold: true, color: 'white' },
            backgroundColor: 'transparent',
            legend: {
              
                
          textStyle: { fontSize: 20, bold: true,color: 'white' } ,
      
          
        },
        chartArea: { left: 300, top: 50, width: '40%', height: '80%' }
          };
          var chartContainer = document.getElementById('piechart');
      chartContainer.style.width = '1800px';  // Set the width of the chart container
      chartContainer.style.height = '600px';
       // Set the height of the chart container
       var chart = new google.visualization.PieChart(chartContainer);
  
          chart.draw(data, options);
        }










































        function drawChart2() {
            var data = google.visualization.arrayToDataTable([
        ["Name of fooditem", "Quantity sold", { role: "style" }],
        <?php
        include '../../dbconnect.php';

        // Calculation part
        $sql = "SELECT Name, Sold_quantity FROM menu ORDER BY Sold_quantity DESC LIMIT 5;";
        $result = mysqli_query($conn, $sql);

        
        $myArray = [];
        $myArray2 = [];

        while ($row = mysqli_fetch_assoc($result)) {
          $item_name = $row['Name'];
          $quantity = $row['Sold_quantity'];
          $myArray[] = $item_name;
          $myArray2[] = $quantity;
        }

        // Outputting data
        for ($i = 0; $i < count($myArray); $i++) {
          echo "['" . $myArray[$i] . "', " . $myArray2[$i] . ", '#b87333'],";
        }
        ?>

      ]);

      
      
      
      
      
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {

            backgroundColor: 'transparent',
            title: "5 Best Sellers",
            titleTextStyle: { fontSize: 25, bold: true, color: 'white' },
        width: 500,
        height: 450,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
        hAxis: {
      title: 'Name of Food Item',
      titleTextStyle: { color: 'white', fontSize: 20 },
      textStyle: { color: 'white', fontSize: 15 } // x-axis labels
    },
    vAxis: {
      title: 'Quantity Sold',
      titleTextStyle: { color: 'white', fontSize: 20 },
      textStyle: { color: 'white', fontSize: 15 } // y-axis labels
    }
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      var chartContainer = document.getElementById("columnchart_values");
        chartContainer.style.width = '700px';
        chartContainer.style.height = '450px';
        chartContainer.style.marginLeft = '900px';  // Adjust the margin-left property

        var chart = new google.visualization.ColumnChart(chartContainer);
        chart.draw(view, options);

  }





      </script>
    </head>
    <body>
      <div id="piechart" style="width: 800px; height: 600px;"></div>
      <div id="columnchart_values" style="width: 700px; height: 600px;"></div>
    </body>
  </html>

