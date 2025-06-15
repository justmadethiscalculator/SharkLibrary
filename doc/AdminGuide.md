# Administrator's Guide - Shark's Library

This guide provides system administrators with detailed steps to **configure**, **maintain**, and **secure** the SharkLibrary web application running on a Raspberry Pi.

---

## Prerequisites

Ensure the following software is installed on your Raspberry Pi:

- Raspberry Pi OS (Lite or Desktop)
- Apache2 Web Server
- PHP 7.4 or later
- MariaDB (MySQL-compatible)
- SSH access or local terminal

> It’s recommended to perform administration tasks as the `root` user or use `sudo`.

---

## Database Configuration

### Log in to MariaDB:
```bash
sudo mariadb -u root
```

### Useful SQL Commands:
```sql
-- Create a new database
CREATE DATABASE librarydb;

-- Create a new user
CREATE USER 'library_user'@'localhost' IDENTIFIED BY 'your_secure_password';

-- Grant privileges
GRANT ALL PRIVILEGES ON librarydb.* TO 'library_user'@'localhost';
FLUSH PRIVILEGES;

-- View all databases
SHOW DATABASES;
```

### Fix File Permission Errors (if any):
```bash
sudo chmod 644 /var/www/html/database/librarydb.sql
```

> Check file permissions:
```bash
ls -l /var/www/html/database/
```

---

## Backend Configuration

Ensure your web files are located at `/var/www/html/` and are accessible by the Apache web server:

```bash
sudo chmod -R 755 /var/www/html
sudo chown -R www-data:www-data /var/www/html
```

---

## Maintenance Guidelines

### 1. Secure the Application

- Change default database credentials
- Use `.htaccess` to restrict sensitive folders
- Set file permissions to read-only when appropriate
- Keep OS and packages updated

### 2. Backup the Database

**Option 1 – Simple Manual Backup:**
```bash
cd /var/www/html/database
mysqldump -u root -p librarydb > backup_librarydb.sql
```

**Option 2 – Timestamped Backup:**
```bash
mkdir -p /var/backups/sharklibrary
mysqldump -u root -p librarydb > /var/backups/sharklibrary/librarydb_$(date +%Y%m%d).sql
```

### 3. Monitor Logs and Stats

**Apache Logs:**
```bash
sudo tail -f /var/log/apache2/error.log
```

**Track Usage:**
- Visit and download stats are stored in the `librarydb` database.

### 4. Update Library Content

- Add PDFs to: `/var/www/html/books/`
- Add cover images to: `/var/www/html/images/covers/`
- Update metadata in the database via MariaDB or PHP scripts

### 5. Test After Changes

Always verify after updates:
- All web pages load correctly
- PDF downloads function
- Comment system works
- Visit/download counters increment

---

## Summary Table

| Task                    | Command or Location                        |
|-------------------------|--------------------------------------------|
| Apache Root Directory   | `/var/www/html/`                           |
| Database Import         | `librarydb.sql`                            |
| Logs                    | `/var/log/apache2/error.log`               |
| Book Files              | `/books/`, `/images/covers/`               |
| Access Site             | `http://raspberrypiIP`                     |

---

## Need Help?

For additional questions or community support, consider documenting custom scripts or edge cases for future admins.
