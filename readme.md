## Eric Blog

A basic blog with user authorisation built by using Laravel 5.1

  - User Authorisation and Authentication
  - Make comments to a post
  - Blog Post View, Create, Edit and Delete (Admin account only).
  - Simple User Management for User View, Create, Edit and Delete (Admin account only).
  - Using CKEditor as WSYSWYG for creating posts and comments.

### Installation

```sh
$ composer install
$ php artisan migrate:install
$ php artisan db:seed
```

1. Composer install all the necessary libraries
2. Install Migration
3. Database Seeds for creating an Admin account and also generating example data.

### License

This blog is an open-sourced software licensed under the [WTFPL license](http://www.wtfpl.net/)
