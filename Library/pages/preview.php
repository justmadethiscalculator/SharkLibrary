<?php
$host = "localhost";
$username = "admin";
$password = "adminpass";
$database = "librarydb";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM book";
$result = $conn->query($sql);

$bookID = isset($_GET['bookID']) ? $_GET['bookID'] : null;
$bookDetails = null;
if ($bookID) {
    $sql = "SELECT * FROM book WHERE bookID = $bookID";
    $bookDetails = $conn->query($sql)->fetch_assoc();
}

$comments = [];
if ($bookID) {
    $sql = "SELECT * FROM comment WHERE bookID = $bookID";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
    $comment = $conn->real_escape_string($_POST['comment']);
    $sql = "INSERT INTO comment (content, bookID) VALUES ('$comment', $bookID)";
    $conn->query($sql);
    header("Location: preview.php?bookID=$bookID");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Previews - Shark's Library</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <img src="../images/library_logo_header.png" alt="shark with TKU written on its belly" class="hleft">
</header>

<main>
    <section id="top-button">
        <div class="button-row">
            <button onclick="location.href='../index.php'">Back to Home</button>
            <button onclick="location.href='about.html'">About Us</button>
            <button onclick="location.href='preview.php'">Previews</button>
            <button onclick="location.href='download.php'">Downloads</button>
        </div>
    </section>

    <section id="book-previews">
        <h1 class="text title">Previews</h1>
        <p class="text">Explore the massive collection of books here at Shark's Library! (Still expanding)</p>
        <div class="gallery">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo '<div class="book-cover">
                        <a href="preview.php?bookID=' . $row['bookID'] . '">
                            <img src="../' . $row['image_path'] . '" alt="Cover of ' . htmlspecialchars($row['title']) . '">
                        </a>
                      </div>';
            }
            ?>
        </div>

        <?php if ($bookDetails): ?>
        <div class="book-details">
            <h2><?php echo htmlspecialchars($bookDetails['title']); ?></h2>
            <p><strong>Author:</strong> <?php echo htmlspecialchars($bookDetails['author']); ?></p>
            <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($bookDetails['description'])); ?></p>

            <div id="comments-section">
                <h3>Comments</h3>
                <form method="POST">
                    <textarea name="comment" placeholder="Add your comment..." required></textarea>
                    <button type="submit">Submit Comment</button>
                </form>

                <?php if (count($comments) > 0): ?>
                    <ul>
                        <?php foreach ($comments as $comment): ?>
                            <li><?php echo htmlspecialchars($comment['content']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No comments yet.</p>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </section>
</main>

<footer>
    <p>© Copyright 2025 Jawsome Co Ltd.</p>
</footer>

</body>
</html>

<?php $conn->close(); ?>
