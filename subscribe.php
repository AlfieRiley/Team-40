<?php



$conn = new mysqli('localhost', 'root', '', 'subscribe');




if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

   
    $sql = "INSERT INTO subscribers (email) VALUES ('$email')";

    
    if ($conn->query($sql) === TRUE) {
        echo "Subscribed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}


$conn->close();
echo "<h2>Thanks for subscribe</h2>";
?>
