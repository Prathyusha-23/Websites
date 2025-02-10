<?php
// Step 1: Database connection settings
$servername = "localhost"; // Database host (XAMPP default is localhost)
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default XAMPP MySQL password (blank)
$dbname = "reuse"; // The database you created

// Step 2: Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Get form data and sanitize inputs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $industry = mysqli_real_escape_string($conn, $_POST['industry']);
    $scrap_amount = mysqli_real_escape_string($conn, $_POST['scrap']);

    // Step 4: Insert data into the database
    $sql = "INSERT INTO scrap_registration (name, password, email, mobile, address, industry, scrap_amount)
            VALUES ('$name', '$password', '$email', '$mobile', '$address', '$industry', '$scrap_amount')";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
        echo "Thanks for selling your scrap!!!! Our volunteer will come and collect scrap from you";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
