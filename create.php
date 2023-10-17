<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Create a New Post</h1>
        <a href="index.php">Back to Home</a>
    </header>
    <main>
        <form method="post" action="create-post.php">
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
            <label for="content">Content</label>
            <textarea id="content" name="content"></textarea>
            <button type="submit">Create Post</button>
        </form>
    </main>
</body>
</html>

<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=blog', 'username', 'password');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare('INSERT INTO posts (title, content) VALUES (?, ?)');
    $stmt->execute([$title, $content]);

    header('Location: index.php');
}
?>
