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

Run the following SQL commands:

```sql
CREATE DATABASE librarydb;
CREATE USER 'user_name'@'localhost' IDENTIFIED BY 'user_password';
GRANT ALL PRIVILEGES ON librarydb.* TO 'admin'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

Import the database schema:

```bash
sudo mysql -u admin -p librarydb < /var/www/html/sharklibrary/database/librarydb.sql
```

### Verify Permissions
Ensure correct file permissions:

```bash
sudo chown -R www-data:www-data /var/www/html/sharklibrary
sudo chmod -R 755 /var/www/html/sharklibrary
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
