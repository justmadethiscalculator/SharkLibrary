# SharkLibrary Installation Guide (Raspberry Pi Zero 2)

Follow these steps to install and run SharkLibrary on your Raspberry Pi Zero 2.

## Prerequisites

- **Raspberry Pi Zero 2** with Raspberry Pi OS (or any Debian-based Linux)
- **PHP 7.4 or higher** (for running the web application)
- **A web browser** (e.g., Chromium, Firefox)
- (Optional) **MariaDB/MySQL** if you want to use the sample database

## 1. Update Your System

Open a terminal and run:

```sh
sudo apt update
sudo apt upgrade
```

## 2. Install PHP and Required Packages

```sh
sudo apt install php php-cli php-mbstring php-xml php-sqlite3
```

If you want to use MySQL/MariaDB:

```sh
sudo apt install mariadb-server php-mysql
```

## 3. Download or Copy SharkLibrary

If you have not already, download or clone the SharkLibrary project to your Pi:

```sh
git clone <repository-url>
```

Or copy the files to your Pi using SCP or a USB drive.

## 4. (Optional) Set Up the Database

If you want to use the sample database, import it:

```sh
sudo mariadb
```

Then in the MariaDB prompt:

```sql
CREATE DATABASE sharklibrary;
USE sharklibrary;
SOURCE /path/to/SharkLibrary/database/librarydb.sql;
```

Update your PHP config if needed to point to your database.

## 5. Start the PHP Built-in Server

Navigate to the `Library` directory:

```sh
cd /path/to/SharkLibrary/Library
php -S 0.0.0.0:8000
```

This will start a local web server accessible on your Pi’s IP at port 8000.

## 6. Open the Application

On your Pi or another device on the same network, open a browser and go to:

```
http://<raspberry-pi-ip>:8000
```

You should see the SharkLibrary home page.

## Troubleshooting

- Check PHP is installed: `php -v`
- If you see errors, check file permissions and ensure all files are present.
- For database features, ensure MariaDB/MySQL is running and your PHP config is correct.

## Uninstallation

To remove SharkLibrary, simply delete the project folder from your Pi.

---

For more details, see the `UserGuide.md` and documentation in the `doc/` folder.
