# SharkLibrary Installation Guide

Follow these steps to install and run SharkLibrary on your local machine.

## Prerequisites

- **macOS, Windows, or Linux**
- **PHP 7.4 or higher** (for running the web application)
- **A web browser** (e.g., Chrome, Firefox, Safari)

## 1. Download or Clone the Repository

If you have not already, download or clone the SharkLibrary project to your computer:

```
git clone <repository-url>
```
Or download and extract the ZIP file.

## 2. Set Up the Application

1. Open a terminal and navigate to the project directory:
   
   ```
   cd /path/to/SharkLibrary/Library
   ```

2. (Optional) If you want to use the provided sample database, import `librarydb.sql` into your MySQL or SQLite server. (The application may work with static files only, depending on your setup.)

## 3. Start the PHP Built-in Server

Run the following command in the `Library` directory:

```
php -S localhost:8000
```

This will start a local web server at http://localhost:8000

## 4. Open the Application in Your Browser

Go to:

```
http://localhost:8000
```

You should see the SharkLibrary home page. You can now browse, preview, and download books.

## Troubleshooting

- Make sure PHP is installed: Run `php -v` in your terminal.
- If you see errors, check file permissions and ensure all files are present.
- For database features, ensure your database server is running and configured as needed.

## Uninstallation

To remove SharkLibrary, simply delete the project folder from your computer.

---

For more details, see the `UserGuide.md` and documentation in the `doc/` folder.
