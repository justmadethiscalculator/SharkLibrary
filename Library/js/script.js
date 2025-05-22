window.onload = function () {
    fadeInImages(); // Call fadeInImages when the page is fully loaded
};

function fadeInImages() {
    // Get all images with the class "fade-in"
    var images = document.querySelectorAll(".fade-in");

    // Add the 'show' class to each image
    images.forEach(function (image) {
        image.classList.add("show");
    });
}

document.addEventListener('DOMContentLoaded', function () {
    // --- Image switching logic ---
    const img = document.getElementById("switchImage");
    const images = ["images/home_header1.png", "images/home_header2.png"];
    let index = 0;

    setInterval(() => {
        index = (index + 1) % images.length;
        img.src = images[index];
    }, 1000); // change every 1000ms

    // --- Search function ---
    const searchBtn = document.getElementById('search-btn');
    const searchInput = document.getElementById('search-input');

    searchBtn.addEventListener('click', function () {
        const searchTerm = searchInput.value.toLowerCase();
        filterBooks(searchTerm);
    });

    // --- Filter function ---
    const categoryFilter = document.getElementById('category-filter');
    categoryFilter.addEventListener('change', function () {
        filterBooks();
    });

    // --- Sort function ---
    const sortBy = document.getElementById('sort-by');
    sortBy.addEventListener('change', function () {
        sortBooks();
    });

    function filterBooks(searchTerm = '') {
        const category = categoryFilter.value;
        const rows = document.querySelectorAll('.download-table tbody tr');

        rows.forEach(row => {
            const title = row.cells[1].textContent.toLowerCase();
            const author = row.cells[2].textContent.toLowerCase();
            const rowCategory = row.cells[3].textContent.toLowerCase();

            const matchesSearch = title.includes(searchTerm) || author.includes(searchTerm);
            const matchesCategory = category === 'all' || rowCategory === category.toLowerCase();

            row.style.display = (matchesSearch && matchesCategory) ? '' : 'none';
        });
    }

    function sortBooks() {
        const sortValue = sortBy.value;
        const tbody = document.querySelector('.download-table tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));

        rows.sort((a, b) => {
            const aTitle = a.cells[1].textContent;
            const bTitle = b.cells[1].textContent;

            switch (sortValue) {
                case 'title-asc':
                    return aTitle.localeCompare(bTitle);
                case 'title-desc':
                    return bTitle.localeCompare(aTitle);
                default:
                    return 0;
            }
        });

        // Remove all existing rows
        tbody.innerHTML = '';
        rows.forEach(row => tbody.appendChild(row));
    }

    // --- Download button functionality ---
    const downloadBtns = document.querySelectorAll('.download-btn');
    downloadBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const row = this.closest('tr');
            const title = row.cells[1].textContent;
            alert(`Downloading: ${title}\n(Due to Copyright laws, you aren't permitted to download this file)`);
        });
    });
});
