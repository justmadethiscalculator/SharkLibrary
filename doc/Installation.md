# SharkLibrary Installation Guide (Raspberry Pi Zero 2)

Follow these steps to install and run SharkLibrary on your Raspberry Pi Zero 2.

## Prerequisites

- **Raspberry Pi Zero 2** with Raspberry Pi OS (or any Debian-based Linux)
- **PHP 7.4 or higher** (for running the web application)
- **A web browser** (e.g., Chromium, Firefox)
- **MariaDB 10.x** (to use the sample database)

## 1. Copy The Files to The Raspberry Pi

Open a terminal command prompt on your pc:
Use the following command

```sh
scp -r <path_to_file_on_pc>\* <user>@<raspberry_pi_ip_address>:/var/www/html/.
```

For example:
```sh
scp -r "C:\Users\me\Downloads\Library\*" root@192.168.141.122:/var/www/html/
```
You may be prompted for the Raspberry Pi user's password: (usually "raspberry", "dietpi" or the password you set). 

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
git clone <https://github.com/justmadethiscalculator/SharkLibrary.git>
```

Or copy the files to your Pi using SCP or a USB drive.

## 4. Set Up the Database

If you want to use the sample database, import it:

```sh
sudo mariadb
```

Then in the MariaDB prompt:

```sql
CREATE DATABASE librarydb;
USE librarydb;
SOURCE /path/to/librarydb/database/librarydb.sql;
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
