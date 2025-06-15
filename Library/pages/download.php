<?php
include('../config.php');

// Handle search
$search = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

// Handle download request
if (isset($_GET['download'])) {
    $bookID = $_GET['download'];
    downloadBook($bookID, $conn);
}

function downloadBook($bookID, $conn) {
    $sql = "SELECT file_path, title FROM book WHERE bookID = $bookID";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $relative_path = $row['file_path'];
        $title = $row['title'];
        
        // Build absolute path - go up one directory from pages/ to Library/, then to books/
        $file_path = "../" . $relative_path;
        
        // Add download_count update
        $update_sql = "UPDATE book SET download_count = download_count + 1 WHERE bookID = $bookID";
        $conn->query($update_sql);
        
        if (file_exists($file_path)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="'.basename($title).'.pdf"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));
            readfile($file_path);
            exit;
        } else {
            echo "<script>alert('File not found: " . htmlspecialchars($file_path) . "');</script>";
        }
    } else {
        echo "<script>alert('Book not found in database.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Downloads - Shark's Library</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/download.css">
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
    
    <section id="download-section">
        <h1 class="text title">Downloads</h1>
        <form method="GET" action="download.php" class="download-controls">
            <div class="search-box">
                <input type="text" name="search" id="search-input" placeholder="Search books..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" id="search-btn">Search</button>
            </div>
            
            <div class="filter-options">
                <label for="category-filter">Filter by:</label>
                <select name="category" id="category-filter">
                    <option value="all" <?php echo $category == 'all' ? 'selected' : ''; ?>>All Categories</option>
                    <option value="fiction" <?php echo $category == 'fiction' ? 'selected' : ''; ?>>Fiction</option>
                    <option value="non-fiction" <?php echo $category == 'non-fiction' ? 'selected' : ''; ?>>Non-Fiction</option>
                    <option value="science" <?php echo $category == 'science' ? 'selected' : ''; ?>>Science</option>
                    <option value="history" <?php echo $category == 'history' ? 'selected' : ''; ?>>History</option>
                </select>
                
                <label for="sort-by">Sort by:</label>
                <select name="sort" id="sort-by">
                    <option value="title-asc">Title (A-Z)</option>
                    <option value="title-desc">Title (Z-A)</option>
                    <option value="downloads-high">Downloads (High-Low)</option>
                    <option value="downloads-low">Downloads (Low-High)</option>
                </select>
            </div>
        </form>
        
        <div class="download-table-container">
            <table class="download-table">
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Downloads</th>
                        <th>Format</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>                    <?php
                    // Build SQL query based on search and filters
                    $sql = "SELECT * FROM book WHERE 1=1";
                    
                    if (!empty($search)) {
                        $sql .= " AND (title LIKE '%$search%' OR description LIKE '%$search%')";
                    }
                    
                    if ($category != 'all') {
                        $sql .= " AND category = '$category'";
                    }
                    
                    // Add sorting
                    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'title-asc';
                    switch ($sort) {
                        case 'title-desc':
                            $sql .= " ORDER BY title DESC";
                            break;
                        case 'downloads-high':
                            $sql .= " ORDER BY download_count DESC";
                            break;
                        case 'downloads-low':
                            $sql .= " ORDER BY download_count ASC";
                            break;
                        default:
                            $sql .= " ORDER BY title ASC";
                    }
                    
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td><img src='../" . htmlspecialchars($row['image_path']) . "' alt='Book Cover' class='table-cover'></td>
                                <td>" . htmlspecialchars($row['title']) . "</td>
                                <td>" . htmlspecialchars($row['author']) . "</td>
                                <td>" . htmlspecialchars($row['category']) . "</td>
                                <td>" . htmlspecialchars($row['download_count']) . "</td>
                                <td>PDF</td>
                                <td><a href='download.php?download=" . $row['bookID'] . "' class='download-btn'>Download</a></td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No books found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<footer>
    <p>© Copyright 2025 Jawsome Co LTd.</p>
</footer>
</body>
</html>

<?php $conn->close(); ?>
