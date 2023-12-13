<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Due Status Page</title>
    <link rel="stylesheet" href="style5.css">
</head>
<body>
<header>
            <nav class="navigation">
                  <a href="../../index.php"> Logout</a>

            </nav>
      </header>
    <div class="container">
        <div class="search-form">
            <form method="post" action="">
                <label for="membership_id">Enter Membership ID:</label>
                <input type="text" id="membership_id" name="membership_id" required>
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "Cafeteria";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $membership_id = $_POST['membership_id'];

                $sql = "SELECT Name, Due FROM Customer WHERE Membership_ID = '$membership_id'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $name = $row["Name"];
                    $due = $row["Due"];
                    echo "<p>Name: $name</p>";
                    echo "<p>Due: $due</p>";
                } else {
                    echo "No results found";
                }

                $conn->close();
            }
            ?>
        </div>
    </div>

    
    <div class="container11">
        <div class="navbar">
        </div>

        <div class="row1">
            <div class="col1">
                <h2>Admin Panel</h2>
            </div>
        </div>

        <div class="col1">

            <div class="card card2">
                <h3>Due Status</h3>
                <p>14820</p>
            </div>
            <div class="card card3">
                <h3>Total Student Due</h3>
                <p>9020</p>
            </div>
            <div class="card card4">
                <h3>Total Faculty Due</h3>
                <p>5800</p>
            </div>
        </div>
    </div>
</body>
</html>