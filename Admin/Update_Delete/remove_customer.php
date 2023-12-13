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

    // Retrieve JSON data from the request body
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    // Check if 'membership_id' exists in the data
    if (isset($data['membership_id'])) {
        $membership_id = $data['membership_id'];

        $sql = "DELETE FROM Customer WHERE Membership_ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $membership_id);

        if ($stmt->execute()) {
            echo "Customer removed successfully";
        } else {
            echo "Error removing customer: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Invalid data format";
    }

    $conn->close();
}
?>
