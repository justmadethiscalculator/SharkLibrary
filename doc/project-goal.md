# SHARK’S LIBRARY

## High-Level Functionalities

- **About Section:** Provide information about the project, its history, and team members.  
- **Book Previews:** Display a collection of shark-related books with cover images and brief descriptions.  
- **Download System:** Allow users to search, filter, and download available books in PDF format.  
- **Responsive Design:** Ensure the website is accessible on different devices.  
- **Interactive Elements:** Include animations and user-friendly navigation.  
- **User Authentication:** Log-in and sign-up.  
- **Comments and Reviews:** User-generated content.

---

## Scenario 1: Exploring Book Previews

**User:** Someone who wants to browse the book catalog  
**Goal:** View fiction books in the "Previews" section  

### User Flow:

1. Clicks "Previews" button  
2. `previews.php` script triggered  
3. Data fetched and HTML gallery rendered  

### System Response:

- Hover triggers JavaScript and CSS effects  
- Enlarged image and description shown  

**Backend:**  
- PHP handles data retrieval and gallery generation  
- Database stores book titles, categories, descriptions, and image paths

---

## Scenario 2: Downloading a Book

**User:** Someone who wants to download a book  
**Goal:** Search and download PDF  

### User Flow:

1. Clicks “Downloads” button  
2. `downloads.php` triggered  
3. Table rendered with book details and download buttons  
4. Uses search bar to filter results  
5. Clicks “Download”  

**System Actions:**  
- PHP locates file by book ID or filename  
- PDF served to user  

**Backend:**  
- PHP handles search and file delivery  
- Database stores title, filename, metadata
