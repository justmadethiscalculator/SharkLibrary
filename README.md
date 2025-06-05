# SharkLibrary

SharkLibrary is a digital library web application that allows users to browse, preview, and download a curated collection of shark-related books. The application features an intuitive interface, book cover previews, and easy navigation for exploring marine biology resources.

## Features
- Browse a collection of shark-related books
- Preview book covers and summaries
- Download books in PDF format
- Simple and user-friendly interface

## Installation
See [Installation.md](./Installation.md) for step-by-step setup instructions.

## Usage
See [UserGuide.md](./UserGuide.md) for how to use the application.

## Project Structure
- `Library/` — Main application code (PHP, HTML, CSS, JS, images, books)
- `database/` — Database SQL file
- `doc/` — Project documentation

## Database Setup
Import the SQL file located at `/database/librarydb.sql` into your MySQL server:

```bash
mysql -u your_user -p your_database < database/librarydb.sql
```