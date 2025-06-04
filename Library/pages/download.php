<!DOCTYPE html>
<html lang="en">
<head>
    <title>Downloads - Shark's Library</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <img src="../images/library_logo_header.png" alt="shark with TKU written on its belly" class="hleft"> 
</header>

<main>
    <section id="top-button">
        <div class="button-row">
            <button onclick="location.href='../index.html'">Back to Home</button>
            <button onclick="location.href='about.html'">About Us</button>
            <button onclick="location.href='preview.html'">Previews</button>
            <button onclick="location.href='download.html'">Downloads</button>
        </div>
    </section>
    
    <section id="download-section">
        <h1 class="text title">Downloads</h1>
        
        <div class="download-controls">
            <div class="search-box">
                <input type="text" id="search-input" placeholder="search">
                <button id="search-btn">enter</button>
            </div>
            
            <div class="filter-options">
                <label for="category-filter">Filter by:</label>
                <select id="category-filter">
                    <option value="all">All Categories</option>
                    <option value="fiction">Fiction</option>
                    <option value="non-fiction">Non-Fiction</option>
                    <option value="science">Science</option>
                    <option value="history">History</option>
                </select>
                
                <label for="sort-by">Sort by:</label>
                <select id="sort-by">
                    <option value="title-asc">Title (A-Z)</option>
                    <option value="title-desc">Title (Z-A)</option>
                </select>
            </div>
        </div>
        
        <div class="download-table-container">
            <table class="download-table">
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>File Size</th>
                        <th>Format</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="../images/c1.jpg" alt="Cover of 'Jaws' by Peter Benchley" class="table-cover"></td>
                        <td>Jaws</td>
                        <td>Peter Benchley</td>
                        <td>Fiction</td>
                        <td>2MB "At least 2 sharks"</td>
                        <td>PDF</td>
                        <td><button class="download-btn">Download</button></td>
                    </tr>
                    <tr>
                        <td><img src="../images/c2.jpg" alt="Cover of 'The Secret History of Sharks' by John A. Long" class="table-cover"></td>
                        <td>The Secret History of Sharks: The Rise of the Ocean's Most Fearsome Predators</td>
                        <td>John A. Long</td>
                        <td>History</td>
                        <td>1MB "There is a shark"</td>
                        <td>PDF</td>
                        <td><button class="download-btn">Download</button></td>
                    </tr>
                    <tr>
                        <td><img src="../images/c3.jpg" alt="Cover of 'Everything You Know About Sharks is Wrong!' by Peter Nick Crumpton & Gavin Scott" class="table-cover"></td>
                        <td>Everything You Know About Sharks is Wrong!</td>
                        <td>Nick Crumpton & Gavin Scott</td>
                        <td>Non-Fiction</td>
                        <td>5MB "That's a lot of sharks"</td>
                        <td>PDF</td>
                        <td><button class="download-btn">Download</button></td>
                    </tr>
                    <tr>
                        <td><img src="../images/c4.jpg" alt="Cover of 'Why Sharks Matter' by David Shiffman" class="table-cover"></td>
                        <td>Why Sharks Matter: A Deep Dive with the World's Most Misunderstood Predator</td>
                        <td>David Shiffman</td>
                        <td>Science</td>
                        <td>1MB "At least 1 shark"</td>
                        <td>PDF</td>
                        <td><button class="download-btn">Download</button></td>
                    </tr>
                    <tr>
                        <td><img src="../images/c5.jpg" alt="Cover of 'Who Would Win? Killer Whale vs. Great White Shark' by Jerry Pallotta" class="table-cover"></td>
                        <td>Who Would Win? Killer Whale vs. Great White Shark</td>
                        <td>Jerry Pallotta</td>
                        <td>Non-Fiction</td>
                        <td>1MB "The shark won :D"</td>
                        <td>PDF</td>
                        <td><button class="download-btn">Download</button></td>
                    </tr>
					<tr>
                        <td><img src="../images/c6.jpg" alt="Cover of 'Marine Biology 5th Edition' by Jeffrey Levinton" class="table-cover"></td>
                        <td>Marine Biology: Function, Biodiversity, Ecology 5th Edition</td>
                        <td>Jeffrey Levinton</td>
                        <td>Science</td>
                        <td>1TB "Woah"</td>
                        <td>PDF</td>
                        <td><button class="download-btn">Download</button></td>
                    </tr>
					<tr>
                        <td><img src="../images/c7.jpg" alt="Cover of 'Marine Biology 11th Edition' by Peter Castro & Michael Huber" class="table-cover"></td>
                        <td>Marine Biology 11th Edition</td>
                        <td>Peter Castro & Michael Huber</td>
                        <td>Science</td>
                        <td>6TB "6+5=11"</td>
                        <td>PDF</td>
                        <td><button class="download-btn">Download</button></td>
                    </tr>
					<tr>
                        <td><img src="../images/c8.jpeg" alt="Cover of 'Shark Lady' by Jess Keatin" class="table-cover"></td>
                        <td>Shark Lady: The True Story of How Eugenie Clark Became the Ocean's Most Fearless Scientist</td>
                        <td>Jess Keating</td>
                        <td>Non-Fiction</td>
                        <td>1MB "Nice shark"</td>
                        <td>PDF</td>
                        <td><button class="download-btn">Download</button></td>
                    </tr>
					<tr>
                        <td><img src="../images/c9.jpg" alt="Cover of 'Shark vs. Train' by Chris Barton" class="table-cover"></td>
                        <td>Shark vs. Train</td>
                        <td>Chris Barton</td>
                        <td>Fiction</td>
                        <td>0MB "The shark lost :C"</td>
                        <td>PDF</td>
                        <td><button class="download-btn">Download</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</main>

<footer>
    <p>© Copyright 2025 Jawsome Co LTd.</p>
</footer>

<script src="../js/script.js"></script>
</body>
</html>
