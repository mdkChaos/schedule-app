# Schedule App

![Laravel](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## Description

**Schedule App** is a web application for managing schedules, employees, shifts, departments, and roles. The app is built with the [Laravel](https://laravel.com/) framework and supports a multi-level role system (User, Manager, Admin, Super Admin).

---

## Main Features

-   User authentication and authorization
-   Roles and access control (User, Manager, Admin, Super Admin)
-   CRUD operations for employees, shifts, departments, brigades, workshops, factories
-   Record recovery and permanent deletion (soft deletes)
-   Interface language switching
-   Route protection and hiding site structure from unauthorized users

---

## Installation

1. **Clone the repository:**

    ```sh
    git clone https://github.com/mdkChaos/schedule-app.git
    cd schedule-app
    ```

2. **Install dependencies:**

    ```sh
    composer install
    npm install && npm run dev
    ```

3. **Configure environment:**

    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. **Set up your database connection in `.env`**

5. **Run migrations and seeders:**

    ```sh
    php artisan migrate --seed
    ```

6. **Start the server:**
    ```sh
    php artisan serve
    ```

---

## Default Users

After seeding the database, these users are available:

| Login       | Password      | Role        |
| ----------- | ------------- | ----------- |
| User        | user123       | User        |
| Manager     | manager123    | Manager     |
| Admin       | admin123      | Admin       |
| Super Admin | superadmin123 | Super Admin |

---

## Role Structure

-   **User** — basic user
-   **Manager** — manager
-   **Admin** — administrator
-   **Super Admin** — full access

---

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## Contacts

For questions and suggestions, please create an issue or pull request in this repository.

GitHub: [mdkChaos](https://github.com/mdkChaos)
