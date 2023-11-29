<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student_style.css">
    <title>Menu</title>
</head>
<body>
    </header>
    <div class="container">
        <h1 class="head1">Available Menu</h1>
        <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
            <tr>
                <th> Name</th>
                <th>Price of Item(s)</th>
                <th>Available Quantity</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "Cafeteria";
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM Menu";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Price'] . "</td>";
                    echo "<td>" . $row['Quantity'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
                    
            $sql = "SELECT Due AS TotalDue, Fines AS TotalFines FROM Customer";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<tr>";
                echo "<td colspan='2'>Total Due:</td>";
                echo "<td colspan='2'>" . $row['TotalDue'] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td colspan='2'>Total Fine:</td>";
                echo "<td colspan='2'>" . $row['TotalFines'] . "</td>";
                echo "</tr>";
            } 
            else {
                echo "<tr><td colspan='4'>No data available</td></tr>";
            }

            $conn->close();
            ?>

            
            
            
        </table>
    </div>

    <footer class="footer">
    <div class="foot-container">
        <div class="row">
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Discover</h4>
                <ul>
                    <li><a href="#">Our Story</a></li>
                    <li><a href="#">Reviews</a></li>
                    <li><a href="#">Event</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact Us</h4>
                <ul class="cntact-info">
                    <li><a href="#">BRAC University Cafeteria</a></li>
                    <li><a href="#">Badda, Dhaka, Bangladesh</a></li>
                    <li><a href="#">Email: bracu.cafeteria@g.bracu.ac.bd</a></li>
                    <li><a href="#">Phone:  +880-2-222264051- 4 (PABX) (Information Desk ext. 4003, 4004), +880-2-222263948, +880-2-222293949</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
