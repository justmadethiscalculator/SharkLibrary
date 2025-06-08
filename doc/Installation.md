# SharkLibrary Installation Guide (Raspberry Pi Zero 2)

Follow these steps to install and run SharkLibrary on your Raspberry Pi Zero 2.
Note: This guide assumes that the user has logged in using the 'root' user, please adjust accordingly

## Prerequisites

- **Raspberry Pi Zero 2** with Raspberry Pi OS (or any Debian-based Linux)
- **PHP 7.4 or higher** (for running the web application)
- **A web browser** (e.g., Chromium, Firefox)
- **MariaDB 10.x** (to use the sample database)

## 1. Update Your System

Open the terminal (through PuTTY or other means), login into the system and run:
```sh
sudo apt update
sudo apt upgrade
```

## 2. Install The Required Packages

```sh
sudo apt install apache2 -y
sudo apt install php php-mysql
sudo apt install mariadb-server -y
sudo apt install git -y # Optional: If you want to copy files through github
```

Verify installation:
```sh
sudo systemctl status apache2
php -v
sudo systemctl status mariadb
```

## 3. Download or Copy The Files to The Raspberry Pi

If you have not already, download or clone the SharkLibrary project to your Pi:

-------------------------------------------------------------------------------------------------------------------------------
## Option 1: Clone from GitHub (git needs to be installed)
In the raspberry pi's terminal: 
```sh
cd /var/www/html
git clone <https://github.com/justmadethiscalculator/SharkLibrary.git>
```

For convenience, move all the files and folders
```sh
sudo mv /var/www/html/SharkLibrary/Library/* /var/www/html/
```

## Option 2: Copy the files to your Pi using SCP
Open a terminal/command prompt on your pc and use the following command:
```sh
scp -r <path_to_file_on_pc>\* <user>@<raspberry_pi_ip_address>:/var/www/html/.
```
Note: both the raspberry pi and your pc must be on the same network.

For example:
```sh
scp -r "C:\Users\me\Downloads\Library\*" root@192.168.141.122:/var/www/html/
```
You may be prompted for the Raspberry Pi user's password: (usually "raspberry", "dietpi" or the password you set). 

-------------------------------------------------------------------------------------------------------------------------------

## 4. Set Up the Database
Return to the root directory and access MariaDB:
```sh
cd /.
mariadb -u root
```

To create the database, in the MariaDB shell use:
```sql
CREATE DATABASE librarydb;
```

To import the database using the sql file:

-------------------------------------------------------------------------------------------------------------------------------
## Option 1: 
In the MariaDB shell:
```sql
USE librarydb;
SOURCE /var/www/html/database/librarydb.sql;
```

## Option 2 (One-liner in Shell, outside MariaDB)
Exit MariaDB using:
```sql
EXIT
```

Then in the terminal enter:
```sql
sudo mariadb -u root librarydb < /var/www/html/database/librarydb.sql
```

  if you get a "Can't open file" error, make sure the file path is correct and accessible by your user (usually root or mysql).
  Try fixing it in the terminal with:
  ```sh
  sudo chmod 644 /var/www/html/database/librarydb.sql
  ```
  If using dietpi, check file permissions with:
  ```sh
  ls -l /var/www/html/database/
  ```
  Then try to import the sql file again.
  
-------------------------------------------------------------------------------------------------------------------------------

After importing the database, you need to create a dedicated Admin User in mariaDB to make it work:
In the MariaDB shell:
```sql
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'adminpass';
GRANT ALL PRIVILEGES ON librarydb.* TO 'admin'@'localhost';
FLUSH PRIVILEGES;
```

Update your PHP config if needed to point to your database.

## 5. Open the Application

Ensure your files are in /var/www/html/ and set the correct permissions so Apache can read them:
```sh
sudo chmod -R 755 /var/www/html
sudo chown -R www-data:www-data /var/www/html
```

On another device on the same network, open a browser and go to:
```
http://<raspberry-pi-ip>
```

You should see the SharkLibrary home page.

## Troubleshooting

- If you see errors, check file permissions and ensure all files are present.
- For database features, ensure MariaDB/MySQL is running and your PHP config is correct.

## Uninstallation
To remove SharkLibrary:
``` sh
sudo rm -rf /var/www/html/*
```
**WARNING**: When deleting folders, always double-check your path before pressing Enter.
For example, you can use:
``` sh
echo rm -rf /var/www/html/*
```
To preview what will be run.

To remove installed packages (optional):
``` sh
sudo apt remove apache2 php mariadb-server -y
```
-------------------------------------------------------------------------------------------------------------------------------

For more details, see the `UserGuide.md` and documentation in the `doc/` folder.
