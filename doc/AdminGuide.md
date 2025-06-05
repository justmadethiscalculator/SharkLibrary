# Administrator's Guide - Shark's Library

This guide provides detailed information for system administrators on how to configure, maintain, and troubleshoot the Shark's Library system.

## System Configuration

### Hardware Requirements

- **Recommended Platform:** Raspberry Pi Zero 2 W
- **Processor:** ARM Cortex-A53, Quad-core 64-bit SoC
- **Storage:** Minimum 8 GB microSD card (16 GB+ recommended)
- **Network:** 2.4GHz 802.11 b/g/n wireless LAN

### Operating System Setup

1. Install DietPi (latest stable release)
2. Configure headless setup for optimal performance
3. Enable SSH for remote administration

### Web Server Configuration

#### Apache Setup
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

### Database Configuration

1. Create a new MySQL database:
```sql
CREATE DATABASE librarydb;
CREATE USER 'library_user'@'localhost' IDENTIFIED BY 'your_secure_password';
GRANT ALL PRIVILEGES ON librarydb.* TO 'library_user'@'localhost';
FLUSH PRIVILEGES;
```

2. Import the database schema:
```bash
mysql -u library_user -p librarydb < database/librarydb.sql
```

## Application Maintenance

### Regular Maintenance Tasks

1. **Database Backup (Weekly)**
   ```bash
   mysqldump -u library_user -p librarydb > backup/librarydb_$(date +%Y%m%d).sql
   ```

2. **Log Rotation (Monthly)**
   - Configure logrotate for Apache logs
   - Archive old logs in `/var/log/apache2/`

3. **Storage Management**
   - Monitor PDF storage usage
   - Clean up temporary files
   ```bash
   find /var/www/html/Library/temp/* -mtime +7 -type f -delete
   ```

### Security Maintenance

1. **File Permissions**
   ```bash
   chown -R www-data:www-data /var/www/html/Library
   find /var/www/html/Library -type f -exec chmod 644 {} \;
   find /var/www/html/Library -type d -exec chmod 755 {} \;
   ```

2. **SSL Certificate Renewal**
   - Monitor SSL certificate expiration
   - Set up auto-renewal if using Let's Encrypt

### Performance Optimization

1. **PHP Configuration**
   - Adjust `memory_limit` in php.ini
   - Enable OpCache for better performance
   - Configure session handling

2. **MySQL Optimization**
   - Regular query optimization
   - Index maintenance
   - Monitor slow queries

## Troubleshooting

### Common Issues

1. **Database Connection Issues**
   - Check MySQL service status
   - Verify database credentials
   - Check network connectivity

2. **File Permission Issues**
   - Verify web server user permissions
   - Check directory ownership
   - Validate file access rights

3. **Performance Issues**
   - Monitor system resources
   - Check Apache/PHP logs
   - Analyze MySQL slow query log

### Monitoring

1. **System Monitoring**
   - CPU usage
   - Memory utilization
   - Disk space
   - Network traffic

2. **Application Monitoring**
   - Apache status
   - PHP-FPM status (if used)
   - MySQL server status

## Backup and Recovery

### Backup Strategy

1. **Daily Backups**
   - Database dumps
   - Configuration files
   - User-uploaded content

2. **Backup Retention**
   - Keep daily backups for 1 week
   - Keep weekly backups for 1 month
   - Keep monthly backups for 1 year

### Recovery Procedures

1. **Database Recovery**
   ```bash
   mysql -u library_user -p librarydb < backup/librarydb_backup.sql
   ```

2. **File System Recovery**
   - Restore from backup archives
   - Verify file permissions
   - Check system integrity

## Contact Support

For technical support or questions about this guide, please contact:
- System Administrator: [admin@sharklibrary.local]
- Technical Support: [support@sharklibrary.local]
