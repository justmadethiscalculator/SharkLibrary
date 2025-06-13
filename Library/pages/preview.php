<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "librarydb";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$books = $conn->query("SELECT * FROM book");

$bookID = isset($_GET['bookID']) ? intval($_GET['bookID']) : null;
$bookDetails = null;
$comments = [];

if ($bookID) {
    $bookDetails = $conn->query("SELECT * FROM book WHERE bookID = $bookID")->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["comment"]) && trim($_POST["comment"]) !== "") {
        $c = $conn->real_escape_string($_POST["comment"]);
        $conn->query("INSERT INTO comment (content, bookID) VALUES ('$c', $bookID)");
        header("Location: preview.php?bookID=$bookID");
        exit;
    }

    $comments = $conn->query("SELECT content FROM comment WHERE bookID = $bookID ORDER BY commentID DESC")
                     ->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Previews - Shark's Library</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header style="height: 20vh">
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
            <?php while ($row = $books->fetch_assoc()): ?>
                <div class="book-cover">
                    <a href="preview.php?bookID=<?= $row['bookID'] ?>">
                        <img src="../<?= $row['image_path'] ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                    </a>
                </div>
            <?php endwhile; ?>
        </div>

        <?php if ($bookDetails): ?>
            <div class="book-details">
                <img src="../<?= $bookDetails['image_path'] ?>" alt="<?= htmlspecialchars($bookDetails['title']) ?>">
                <h2><?= htmlspecialchars($bookDetails['title']) ?></h2>
                <p><strong>Author: </strong><?= htmlspecialchars($bookDetails['author']) ?></p>
                <p class="book-description"><?= nl2br(htmlspecialchars($bookDetails['description'])) ?></p>

                <div id="comments-section">
                    <h3>Comments</h3>
                    <form method="post">
                        <textarea name="comment" placeholder="Add your comment..." required></textarea>
                        <button type="submit">Submit Comment</button>
                    </form>

                    <?php if ($comments): ?>
                        <?php foreach ($comments as $c): ?>
                            <div class="comment"><?= htmlspecialchars($c['content']) ?></div>
                        <?php endforeach; ?>
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
