# Shark's Library

Welcome to Shark's Library — a modern, web-based digital library dedicated to shark science and marine biology. This project provides a curated collection of books, interactive previews, and a secure download system, all designed for an engaging and educational experience.

## What is Shark's Library?

Shark's Library is an open-source platform for discovering, previewing, and downloading books about sharks and ocean science. It is designed for students, educators, and enthusiasts who want easy access to high-quality marine literature.

## Key Features

- Curated collection of shark and marine biology books
- Book previews with cover images and summaries
- Fast, secure PDF downloads
- Responsive design for desktop and mobile
- User-friendly navigation and interactive UI
- Community reviews and comments

## Getting Started

### Requirements

- PHP 7.4+
- MySQL 5.7+
- Apache or Nginx web server
- (Recommended) Raspberry Pi Zero 2 W for deployment

### Installation

1. Clone this repository to your web server:

   ```bash
   git clone https://github.com/your-username/SharkLibrary.git
   ```

2. Set up your web server to serve the `Library/` directory.
3. Adjust file permissions as needed for your environment.

## Database Setup

Import the SQL file located at `/database/librarydb.sql` into your MySQL server:

```bash
mysql -u your_user -p your_database < database/librarydb.sql
```

## Book Collection

The following books are included:

- Everything You Know About Sharks is Wrong
- Jaws
- Marine Biology (11th Edition)
- Marine Biology & Ecology (5th Edition)
- Shark Lady
- Shark vs Train
- The Secret History of Sharks
- Who Would Win: Whale vs Shark
- Why Sharks Matter

## Documentation

- For admin setup and maintenance, see `doc/AdminGuide.md`
- For user instructions, see `doc/UserGuide.md`
- For installation help, see `doc/Installation.md`

## License

This project is for educational and non-commercial use. See the repository for details.
