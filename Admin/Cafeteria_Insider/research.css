<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research</title>
    <link rel="stylesheet" href="research.css">
</head>
<body>
    <header>
        <h1>Research Results</h1>
    </header>
    <main>
        <section class="metrics">
            <div class="metric">
                <h2>Profit</h2>
                <div class="bar-chart">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cafeteria";

                 
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT DATE_FORMAT(Date, '%b') AS Month, SUM(Total) AS TotalSales FROM Sales GROUP BY YEAR(Date), MONTH(Date) ORDER BY YEAR(Date), MONTH(Date)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $x = $row["TotalSales"] / 1.25;
                            $profit = $row["TotalSales"] - $x;
                            $month = $row["Month"];
                            echo "<div class='bar'><span>$month</span><p>৳" . number_format($profit) . "</p><div class='progress' style='height:" . ($profit / 50) . "px;'></div></div>";
                        }
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
            <div class="metric">
                <h2>Customer Satisfaction Rate</h2>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cafeteria";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT COUNT(*) AS FeedbackCount, SUM(Rating) AS TotalRating FROM Feedback";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $feedbackCount = $row["FeedbackCount"];
                        $totalRating = $row["TotalRating"];
                        
                        if ($feedbackCount > 0) {
                            $satisfactionRate = ($totalRating / $feedbackCount) * 20;
                            echo "<div class='progress-bar'><div class='progress' style='width: " . $satisfactionRate . "%;'><p>" . number_format($satisfactionRate, 2) . "%</p></div></div>";
                        } else {
                            echo "<p>No feedback available.</p>";
                        }
                    } else {
                        echo "<p>No feedback available.</p>";
                    }
                    $conn->close();
                ?>
            </div>
        </section>
        <section class="customer-reviews">
            <h2>Customer Reviews</h2>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "cafeteria";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT Feedback.Customer_id, Feedback.Suggestions, Customer.Name AS CustomerName FROM Feedback JOIN Customer ON Feedback.Customer_id = Customer.Membership_ID";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $customerName = $row["CustomerName"];
                        $comment = $row["Suggestions"];
                        
                        echo "<div class='review'>";
                        echo "<div class='user-info'>";
                        echo "<p>$customerName</p>";
                        echo "</div>";
                        echo "<p class='comment'>$comment</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No reviews available.</p>";
                }
                $conn->close();
            ?>
        </section>
    </main>
</body>
</html>     

