# Run-Time Requirements – Shark’s Library

This document outlines the hardware and software requirements to run the Shark’s Library system in the intended development and demonstration environment.

## Hardware Platform

The application is designed to run on:

- **Device:** Raspberry Pi Zero 2 W and a micro USB data cable  
- **Architecture:** ARM Cortex-A53, Quad-core 64-bit SoC  
- **Storage:** Minimum 8 GB microSD card (recommended 16 GB or more)  
- **Networking:** 2.4GHz 802.11 b/g/n wireless LAN  

## Operating System

- **Base OS:** [DietPi](https://dietpi.com) (a lightweight Debian-based OS optimized for single-board computers)  
  - **Version:** Latest stable release compatible with Raspberry Pi Zero 2 W  
  - **Note:** Headless setup recommended for lightweight performance  

## Software Packages

The following software packages must be installed and properly configured:

### 1. Web Server
- Apache2 (preferred) or Nginx  
- Port: HTTP on port 80  

### 2. PHP
- Version: PHP 7.4 or higher  
- Modules: `php-mysql` (provides both mysqli and pdo_mysql support)

### 3. Database
- MariaDB 10.x (MySQL-compatible relational database)

### Optional Tool(s)
- Git (for cloning or pulling files from GitHub)
