# Administrator's Guide - Shark's Library

This guide provides detailed information for system administrators on how to **configure**, **maintain**, and **troubleshoot** the Shark's Library system.

---
### Prerequisites

Ensure your Raspberry Pi has the following installed:
- Raspberry Pi OS (Lite or Desktop)
- Apache2 Web Server
- PHP (7.4 or later)
- MariaDB (MySQL-compatible)
- SSH access or local terminal

Make sure to log in as a root user for convenience.

### Database Configuration

Log into MariaDB using:
```bash
sudo mariadb -u root
```

Here are a few commands that may help with your configuration"
1. To create a new database:
```sql
CREATE DATABASE database_name;
```

2. To view all databases on the server:
```sql
SHOW DATABASES;
```

3. To create a new user:
```sql
USE database_name;
CREATE USER 'user_name'@'localhost' IDENTIFIED BY 'user_password';
GRANT ALL PRIVILEGES ON database_name.* TO 'user_name'@'localhost';
FLUSH PRIVILEGES;
```

### Verify Permissions

Ensure correct file permissions:
**Database**
if you get a "Can't open file" error, make sure the file path is correct and accessible by your user (usually root).
Try fixing it in the terminal with:
```sh
sudo chmod 644 /var/www/html/database/librarydb.sql
```

If using dietpi, check file permissions with:
```sh
ls -l /var/www/html/database/
```

**Backend**

Ensure your files are in /var/www/html/ and set the correct permissions so Apache can read them:
```sh
sudo chmod -R 755 /var/www/html
sudo chown -R www-data:www-data /var/www/html
```

---

## Maintenance Guidelines

### 1. Backup the Database

Regularly back up the database:

```bash
mysqldump -u admin -p librarydb > backup_librarydb.sql
```

### 2. Check Logs and Metrics

Monitor Apache logs:

```bash
sudo tail -f /var/log/apache2/error.log
```

Track visit and download statistics via the database table `librarydb`.

### 3. Update Library Content

To add or update books:

- Add new PDFs to `/var/www/html/sharklibrary/books/`
- Add corresponding cover images to `/images/covers/`
- Update any necessary details in the database manually or via PHP scripts

### 4. Secure the Application

- Change the default database password
- Keep the OS and packages up to date
- Restrict sensitive folders using `.htaccess`
- Consider setting file permissions to read-only where appropriate

### 5. Test After Changes

After changes or updates, always verify that:

- All web pages load correctly
- PDF downloads and comments work
- Visit and download counters increment as expected

---

## Summary

| Task | Command or Location |
|------|----------------------|
| Apache Root | `/var/www/html/sharklibrary/` |
| Database Import | `librarydb.sql` |
| Logs | `/var/log/apache2/error.log` |
| Book Files | `books/` and `images/covers/` |
| Access Site | `http://raspberrypiIP` |

---

For further help, contact the system administrator or your development team.
