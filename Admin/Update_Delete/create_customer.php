<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Cafeteria";
    echo "Here";
    $data = json_decode(file_get_contents("php://input"));

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $data->id;
    $name = $data->name;
    $password = $data->password;
    $email = $data->email;
    $address = $data->address;
    $phone = $data->phone;
    $due = $data->due;
    $type = $data->type;
    $fines = $data->fines;
    $faculty_type = $data->faculty_type;

    $sql = "UPDATE Customer SET Name=?, Password=?, Email=?, Address=?, Phone=?, Due=?, Fines=?, Type=?, Facult_type=? WHERE Membership_ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $name, $password, $email, $address, $phone,$due,$fines,$type,$faculty_type, $id);

    if ($stmt->execute()) {
        echo "Customer updated successfully";
    } else {
        echo "Error updating customer: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
