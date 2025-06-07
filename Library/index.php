<?php
$host = "localhost";
$username = "admin";        // Change if necessary
$password = "adminpass";            // Change if your MariaDB has a password
$database = "librarydb";

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Increase the visit count
$conn->query("UPDATE visitcount SET visit_count = visit_count + 1");

// Get the updated count
$visit_update = $conn->query("SELECT visit_count FROM visitcount");
$row_visit = $visit_update->fetch_assoc();
$visit_count = $row_visit['visit_count'];

// Get the total downloads
$download_update = $conn->query("SELECT SUM(download_count) AS total_downloads FROM book");
$row_download = $download_update->fetch_assoc();
$download_count = $row_download['total_downloads'] ?? 0;

$conn->close();
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title>Welcome to Shark's Library</title>
	<link rel="stylesheet" href="css/style.css"> <!--Links to the external style.css file -->
</head>

<style>
	*{
		font-family: arial, sans-serif; <!--Example of embedded CSS: Make all font in this file to the defined type -->
	}
</style>

<body>
<header style="height: 120px"> <!--Example of inline CSS-->
	<img id="switchImage" src="images/home_header1.png" alt="Welcome to Shark's Library" class="home-header">
</header>

<main>
	<section id="about"> <!--Helps divide the page into sections-->
		<div class="container"> <!--Defines what is in the section, check the style.css file-->
			<img src="images/library_logo.png" alt="shark with TKU written on its belly" class="home-logo fade-in" id="image1"><!--Logo is in the image folder-->
			<a href="pages/about.html">
				<img src="images/about_button.png" alt="about us" class="home-button habout fade-in" id="image1">
			</a>
			<img src="images/home_shark.png" alt="Shark that's waving its arms" class="home-shark fade-in longer" id="image4">
		</div>
	</section>
	<section id="counter">
		<div class="container">
			<p style="text-align:center;"> <?php echo $visit_count; ?> VISITS | <?php echo $download_count; ?> DOWNLOADS</p>
	</section>
	<section id="preview">
		<div class="container">
			<a href="pages/preview.php">
				<img src="images/preview_button.png" alt="previews" class="home-button hpreview about img-right fade-in"id="image2">
			</a>
			<div class="textwrapper-home">
				<div class="bolded">
					<p>Check it out! The previews section includes:</p>
					<ul>
					  <li>Many popular book titles on sharks</li>
					  <li>Fun books about sharks</li>
					  <li>And much more!</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section id="download">
		<div class="container">
			<a href="pages/download.php">
				<img src="images/download_button.png" alt="downloads" class="home-button hdownload fade-in" id="image3">
			</a>
			<div class="textwrapper-home text-right">
				<div class="bolded">
					<p style="padding-right: 50px">Grab a copy! The downloads section includes:</p>
					<ul style="padding-right: 320px;">
						<li>Book search function</li>
						<li>Information on books</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
</main>

<footer>
	<p>© Copyright 2025 Jawsome Co LTd.</p>
</footer>

<script src="js/script.js"></script> <!--Links to the external script.js javascript file -->
</body>
</html>
