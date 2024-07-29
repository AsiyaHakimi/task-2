<?php
$conn = new mysqli('localhost', 'root', '', 'blogs');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Update post
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Post updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET['id'];

    // Fetch post
    $sql = "SELECT * FROM posts WHERE id=$id";
    $result = $conn->query($sql);
    $post = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Post</title>
</head>
<body>
    <h1>Update Post</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        <input type="text" name="title" value="<?php echo $post['title']; ?>" required>
        <textarea name="content" required><?php echo $post['content']; ?></textarea>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Back to Blog</a>
</body>
</html>
<?php $conn->close(); ?>
