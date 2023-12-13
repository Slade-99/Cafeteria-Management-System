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

    
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    // Check if 'membership_id' exists in the data
    if (isset($data['membership_id'])) {
        $membership_id = $data['membership_id'];
        $name = $data['name'];
        $password = $data['password'];
        $email = $data['email'];
        $address = $data['address'];
        $phone = $data['phone'];
        $due = $data['due'];
        $fines = $data['fines'];
        $type = $data['type'];
        $faculty_type = $data['faculty_type'];
        $sql = "UPDATE Customer SET Name=?, Password=?, Email=?, Address=?, Phone=?, Due=?, Fines=?, Type=?, Faculty_type=? WHERE Membership_ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssss", $name, $password, $email, $address, $phone,$due,$fines,$type,$faculty_type, $membership_id);
    
        if ($stmt->execute()) {
            echo "Customer updated successfully";
        } else {
            echo "Error updating customer: " . $conn->error;
        }
    
        $stmt->close();
        $conn->close();
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}
}
?>