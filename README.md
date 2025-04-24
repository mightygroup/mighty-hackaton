# Mighty Hackaton Website

A web application for managing and showcasing hackathon submissions. This platform serves as a central hub for the Mighty Hackaton event, providing a way to display and manage participant submissions.

## Overview

The Mighty Hackaton Website is a PHP-based web application that:
- Stores & manages hackathon submissions in a generated text-file.
- Provide a UI interface for participants and visitors.
- Support custom routing and controllers.

## Features

- Custom routing system for clean URLs
- MVC-like architecture
- Organized submission management
- Static asset handling (JS, CSS, images)
- Composer-based dependency management

## Project Structure

```
mighty-hackaton/
├── public/              # Publicly accessible files
│   ├── css/            # Stylesheets
│   ├── js/             # JavaScript files
│   ├── images/         # Image assets
│   ├── sound/          # Audio files
│   └── index.php       # Entry point
├── src/                # Application source code
│   ├── App.php         # Main application class
│   ├── Router.php      # Routing system
│   ├── Route.php       # Route definitions
│   ├── Controller.php  # Base controller
│   └── IndexController.php # Main controller
├── submitions/         # Hackathon submissions
├── vendor/            # Composer dependencies
├── .htaccess          # Apache configuration
└── composer.json      # PHP dependencies
```

## Setup Instructions

1. Clone the repository
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Configure your web server to point to the `public` directory
4. Ensure mod_rewrite is enabled for Apache
5. Set up proper file permissions

## Development

The application uses a custom routing system and follows a simple MVC-like pattern. New features can be added by:

1. Creating new controllers in the `src` directory
2. Adding routes in the Router class
3. Creating corresponding views in the public directory

## Author

- **Philip Rosenqvist** - Frontend Developer at Mighty Group
- GitHub: [b21phiro](https://github.com/b21phiro)