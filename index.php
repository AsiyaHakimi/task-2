<?php
// Connection
$conn = new mysqli('localhost', 'root', '', 'blogs');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch posts
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Blog</title>
</head>
<body>
    <h1>Blog Posts</h1>
    <a href="create.php">Create New Post</a>
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="post">
            <h2><?php echo $row['title']; ?></h2>
            <p><?php echo $row['content']; ?></p>
            <small>Posted on: <?php echo $row['created_at']; ?></small>
            <br>
            <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
        </div>
    <?php endwhile; ?>
</body>
</html>
<?php $conn->close(); ?>
