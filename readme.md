## Eric's Blog

A basic blog built by using Laravel 5.1

  - User Authorisation and Authentication (User Login and Register)
  - Make comments to a post
  - Blog Post View, Create, Edit and Delete (Admin account only).
  - Simple User Management for User View, Create, Edit and Delete (Admin account only).
  - Using CKEditor as WSYSWYG for creating posts and comments.

### Requirement

  - PHP >= 5.5.9
  - Laravel >= 5.1
  - Composer
  - Firefox / Chrome (IE is not tested)

### Installation

```sh
$ composer install
$ php artisan migrate:install
$ php artisan db:seed
```

1. Composer install all the necessary libraries
2. Install Migration
3. Database Seeds for creating an Admin account and also generating example data.
 
### Default Accounts

  - Admin
  ```
  Email: admin@admin.com
  ```
  ```
  Password: password
  ```
  - User
  ```
  Email: user@user.com
  ```
  ```
  Password: password
  ```

### License

This blog is an open-sourced software licensed under the [WTFPL license](http://www.wtfpl.net/)
