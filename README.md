<h1 align="center">Your Blog</h1>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Your Blog

"Your Blog!" is a simple and elegant blogging platform built with Laravel, Laravel Jetstream, and Filepond. Express
yourself, share your thoughts, and connect with others through this user-friendly blogging experience.

## Features

- User Authentication: Secure user registration and authentication powered by Laravel Jetstream.

- Create and Edit Posts: Easily create, edit, and delete your blog posts with a beautiful and intuitive user interface.

- Filepond Integration: Seamless integration of Filepond for easy and efficient file uploads. Drag and drop your images
  to enhance your blog posts.

- Notification System: Stay informed with real-time notifications. Receive updates when new comments are added to your
  posts, and get notified about new posts or updates from other users.

## Getting Started

### Prerequisites

- PHP (>= 7.3)
- Composer
- Node.js
- NPM

### Installation

1. Clone the repository

2. Install PHP dependencies:
   `composer install`

3. Install NPM dependencies:
   `npm install`

4. Copy the .env.example file to .env and configure your database settings:
   `cp .env.example .env`

5. Generate the application key:
   `php artisan key:generate`

6. Migrate the database:
   `php artisan migrate`

7. Link storage:
   `php artisan storage:link`

8. Run the development server:
   `php artisan serve`

9. Run the queue worker for processing background jobs:
   `php artisan queue:work`

### Credits

- **[Laravel](https://laravel.com/)**
- **[Laravel Jetstream](https://jetstream.laravel.com/)**
- **[Filepond](https://pqina.nl/filepond/)**

## License

Your Blog! is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
