<?php
$id = $_GET['id'];

// Connection
$conn = new mysqli('localhost', 'root', '', 'blogs');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete post
$sql = "DELETE FROM posts WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Post deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
?>
