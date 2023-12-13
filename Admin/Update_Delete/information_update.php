<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update or Delete Customer</title>
    <link rel="stylesheet" href="i.css">
</head>
<body>
<header>
            <nav class="navigation">
                  <a href="../../index.php"> Logout</a>

            </nav>
      </header>
    <div class="container12">
    <div class="form_container">
            <form class="create_form">
                  <input type="text" id="id" placeholder="ID">
                  <input type="text" id="name" placeholder="Name">
                  <input type="text" id="password" placeholder="Password">
                  <input type="text" id="email" placeholder="Email">
                  <input type="text" id="address" placeholder="Address">
                  <input type="text" id="phone" placeholder="Phone">
                  <input type="text" id="Due" placeholder="Due">
                  <input type="text" id="Fines" placeholder="Fines">
                  <input type="text" id="Type" placeholder="Type">
                  <input type="text" id="Faculty_type" placeholder="Faculty_type">
                  <button onclick="createCustomer()">Update</button>
            </form>
    </div>
            <table class="table1">
                  <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Due</th>
                        <th>Fine</th>
                        <th>Type</th>
                        <th>Faculty Type</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="table_data" id="tbody">
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "Cafeteria";
    
                        $conn = new mysqli($servername, $username, $password, $dbname);
    
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
    
                        $sql = "SELECT * FROM Customer";
                        $result = $conn->query($sql);
    
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$row["Membership_ID"]."</td>";
                                echo "<td>".$row["Name"]."</td>";
                                echo "<td>".$row["Password"]."</td>";
                                echo "<td>".$row["Email"]."</td>";
                                echo "<td>".$row["Address"]."</td>";
                                echo "<td>".$row["Phone"]."</td>";
                                echo "<td>".$row["Due"]."</td>";
                                echo "<td>".$row["Fines"]."</td>";
                                echo "<td>".$row["Type"]."</td>";
                                echo "<td>".$row["Facult_type"]."</td>";
                                echo "<td>
                                          <button onclick='removeCustomer(\"".$row['Membership_ID']."\")'>Remove</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        ?>
                    </tbody>
            </table>
        </div>
    </div>

    <script>
        let id, name, password, email, address, phone;

        function createCustomer() {
            id = document.getElementById('id').value;
            name = document.getElementById('name').value;
            password = document.getElementById('password').value;
            email = document.getElementById('email').value;
            address = document.getElementById('address').value;
            phone = document.getElementById('phone').value;
            due = document.getElementById('Due').value;
            fines = document.getElementById('Fines').value;
            type = document.getElementById('Type').value;
            faculty_type = document.getElementById('Faculty_type').value;

            fetch('create_customer.php', {
                method: 'POST',
                body: JSON.stringify({
                    id: id,
                    name: name,
                    password: password,
                    email: email,
                    address: address,
                    phone: phone,
                    due:due,
                    fines:fines,
                    type:type,
                    faculty_type:faculty_type,
                }),
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
    if (response.ok) {
        alert("Customer Created Successfully");
        const tableBody = document.getElementById('tbody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${id}</td>
            <td>${name}</td>
            <td>${password}</td>
            <td>${email}</td>
            <td>${address}</td>
            <td>${phone}</td>
            <td>
                <button onclick='updateCustomer("New ID")'>Update</button>
                <button onclick='removeCustomer("New ID")'>Remove</button>
            </td>
        `;
        tableBody.appendChild(newRow);
        document.getElementById('name').value = '';
        document.getElementById('password').value = '';
        document.getElementById('email').value = '';
        document.getElementById('address').value = '';
        document.getElementById('phone').value = '';
    } else {
        alert("Failed to Create Customer. Please Try Again.");
    }
})

            .catch(error => {
                alert("Customer Created Successfully");
            });
        }

        function updateCustomer(customerID) {
            id = document.getElementById('id').value;
            name = document.getElementById('name').value;
            password = document.getElementById('password').value;
            email = document.getElementById('email').value;
            address = document.getElementById('address').value;
            phone = document.getElementById('phone').value;
            due = document.getElementById('Due').value;
            fines = document.getElementById('Fines').value;
            type = document.getElementById('Type').value;
            faculty_type = document.getElementById('Faculty_type').value;
            
            fetch('update_customer.php', {
                method: 'POST',
                body: JSON.stringify({
                    membership_id: customerID,
                    name: name,
                    password: password,
                    email: email,
                    address: address,
                    phone: phone,
                    due:due,
                    fines:fines,
                    type:type,
                    faculty_type:faculty_type,
                }),
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (response.ok) {
                    alert("Information Updated");
                } else {
                    alert("Information Couldn't be Updated. Please Try Again.");
                }
            })
            .catch(error => {
                alert("Network error occurred. Please Try Again.");
            });
        }

        function removeCustomer(customerID) {
            fetch('remove_customer.php', {
                method: 'POST',
                body: JSON.stringify({
                    membership_id: customerID,
                }),
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (response.ok) {
                    alert("Information Removed");
                } else {
                    alert("Information Couldn't be Removed. Please Try Again.");
                }
            })
            .catch(error => {
                alert("Network error occurred. Please Try Again.");
            });
        }
    </script>
</body>
</html>