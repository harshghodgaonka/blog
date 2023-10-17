<!DOCTYPE html>
<html>
<head>
    <title>Blog Website</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>My Blog</h1>
        <a href="create.php">Create Post</a>
    </header>
    <main>
        <section class="blog-posts">
            <!-- Display a list of blog posts here -->
            <!-- Each post should have a title, content, and links for edit and delete -->
        </section>
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
