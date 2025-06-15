# Administrator's Guide - Shark's Library 🦈

This guide provides detailed information for system administrators on how to **configure**, **maintain**, and **troubleshoot** the Shark's Library system.

---

## ⚙️ System Configuration

### Web Server Configuration

Ensure Apache is configured with a virtual host for SharkLibrary:

```apache
<VirtualHost *:80>
    ServerName library.local
    DocumentRoot /var/www/html/Library
    <Directory /var/www/html/Library>
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog ${APACHE_LOG_DIR}/library_error.log
    CustomLog ${APACHE_LOG_DIR}/library_access.log combined
</VirtualHost>
```

Enable and restart Apache:

```bash
sudo a2ensite library.conf
sudo systemctl reload apache2
```

### Database Configuration

Create the database and user:

```sql
CREATE DATABASE librarydb;
CREATE USER 'library_user'@'localhost' IDENTIFIED BY 'your_secure_password';
GRANT ALL PRIVILEGES ON librarydb.* TO 'library_user'@'localhost';
FLUSH PRIVILEGES;
```

Import the initial schema:

```bash
mysql -u library_user -p librarydb < /var/www/html/Library/database/librarydb.sql
```

---

## 🛠 Application Maintenance

### 🔁 Regular Maintenance Tasks

**Database Backup (Weekly):**
```bash
mysqldump -u library_user -p librarydb > backup/librarydb_$(date +%Y%m%d).sql
```

**Log Rotation (Monthly):**
- Configure logrotate for Apache logs.
- Archive old logs in `/var/log/apache2/`.

**Storage Management:**
- Monitor PDF storage usage.
- Clean temporary files older than 7 days:
```bash
find /var/www/html/Library/temp/* -mtime +7 -type f -delete
```

### 🔐 Security Maintenance

**File Permissions:**
```bash
chown -R www-data:www-data /var/www/html/Library
find /var/www/html/Library -type f -exec chmod 644 {} \;
find /var/www/html/Library -type d -exec chmod 755 {} \;
```

**SSL Certificate Renewal:**
- Monitor certificate expiration.
- Use Certbot for Let's Encrypt auto-renewals.

### 🚀 Performance Optimization

**PHP Configuration:**
- Increase `memory_limit` in `php.ini`.
- Enable OpCache.
- Optimize session settings.

**MySQL Optimization:**
- Optimize queries and indexes.
- Monitor and resolve slow queries.

---

## 🧰 Troubleshooting

### Common Issues

**Database Connection Issues:**
- Check MySQL service:
  ```bash
  sudo systemctl status mariadb
  ```
- Verify database credentials.
- Check network and socket connectivity.

**File Permission Issues:**
- Confirm ownership and access rights.

**Performance Issues:**
- Monitor resources using `htop`, `iotop`, or `vmstat`.
- Analyze Apache, PHP, and MySQL logs.

---

## 📊 Monitoring

### System Monitoring
- CPU, Memory, Disk, Network

### Application Monitoring
- Apache and MySQL status
- PHP-FPM (if used)

---

## 🔄 Backup and Recovery

### Backup Strategy

**Daily:**
- Database, config files, user uploads

**Retention:**
- Daily for 7 days
- Weekly for 1 month
- Monthly for 1 year

### Recovery Procedures

**Database Recovery:**
```bash
mysql -u library_user -p librarydb < backup/librarydb_backup.sql
```

**File System Recovery:**
- Restore from backup
- Set correct permissions
- Validate functionality

---

## 📬 Contact Support
