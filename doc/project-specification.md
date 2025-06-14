# Specification for Final Project Demonstration – Shark's Library (2025)

## 1. Demo Scenario Overview

The final demo will demonstrate a functional library catalog.

### Presented Features:
- **Homepage:**  
  - Displays current time  
  - Visit count  
  - Book download count  

- **Book Preview Page:**  
  - Book covers and short descriptions  
  - Editable, interactive comments  

- **Book Download Page:**  
  - Searchable table  
  - PDF download functionality  

### User Actions:
- **Homepage:**  
  - View visit and download counts  

- **Previews Page:**  
  - Add comments  
  - View others’ comments  

- **Downloads Page:**  
  - Search by keyword  
  - Click to download PDF  

### Functional Pages:
- `index.php` – Time + counter retrieval  
- `about.html` – Static HTML page  
- `previews.php` – Loads and displays book previews  
- `downloads.php` – Displays downloadable books with search

All data is pulled dynamically from a database.

---

## 2. Planned URL Endpoints

| URL Path        | HTTP Method | HTTP Variables      | Session Variables | Database/Table Operations                           |
|------------------|--------------|----------------------|-------------------|-----------------------------------------------------|
| `/index.php`     | GET          | None                 | time              | Fetch time, read/update visit & download counts     |
| `/about.html`    | None         | None                 | None              | Static page                                         |
| `/previews.php`  | GET, POST    | comment, bookID      | None              | Fetch preview data, insert comment                 |
| `/downloads.php` | GET          | search, id/filename  | None              | Fetch book list, serve PDF, update download count  |

---

## 3. Database Design

### Entity-Relationship Diagram (ERD)
(Visual not shown here; described via table structure)

### Relational Model:

#### VisitCount Table:
| Field        | Type | Note                             |
|--------------|------|----------------------------------|
| visit_count  | INT  | Total number of homepage visits  |

#### Book Table:
| Field           | Type         | Note                       |
|-----------------|--------------|----------------------------|
| bookID          | INT          | Primary key                |
| title           | VARCHAR(255) | Book title                 |
| description     | TEXT         | Book description           |
| author          | VARCHAR(255) | Book's author              |
| category        | VARCHAR(25)  | Book category              |
| file_path       | VARCHAR(255) | Path to PDF file           |
| image_path      | VARCHAR(255) | Path to cover image        |
| download_count  | INT          | Number of downloads        |

#### Comment Table:
| Field       | Type | Note                       |
|-------------|------|----------------------------|
| commentID   | INT  | Primary key                |
| content     | TEXT | Comment content            |
| bookID      | INT  | Foreign key to book table  |

### Normalization:

- The model is in **Third Normal Form (3NF)**  
- All attributes depend only on their primary key  
- **Optimization:** `download_count` included in `Book` table to avoid redundancy
