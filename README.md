# E-Commerce Platform

This project is a fully functional and modern E-Commerce platform built using Laravel 12, Livewire 3, Filament 3, and Tailwind CSS. 
It provides a seamless online shopping experience with dynamic user interactions, a powerful admin dashboard, and a responsive UI.

## Key Features

* **User Authentication & Authorization:** Secure user login, registration, and role-based access control.
* **Product Management:** Comprehensive CRUD (Create, Read, Update, Delete) operations for products, categories, and brands, managed through Filament 3.
* **Dynamic Frontend:** Interactive, real-time shopping experience powered by Livewire 3, minimizing the need for complex JavaScript.
* **Shopping Cart & Checkout:** Integrated cart functionality and a streamlined checkout process for smooth transactions.
* **Order Management:** Intuitive admin panel for efficient handling of customer orders and shipments.
* **Responsive Design:** Modern and responsive user interface built with Tailwind CSS, ensuring compatibility across various devices.

## Technologies Used

* **Backend:** Laravel 12, Livewire 3
* **Admin Panel:** Filament 3
* **Frontend:** Tailwind CSS
* **Database:** MySQL

## Installation

1.  **Clone the repository:**

    ```bash
    git clone <repository_url>
    cd <project_directory>
    ```

2.  **Install Composer dependencies:**

    ```bash
    composer install
    ```

3.  **Copy the `.env.example` file to `.env` and configure your database settings:**

    ```bash
    cp .env.example .env
    ```

    Modify the `.env` file with your database credentials:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

4.  **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

5.  **Run database migrations:**

    ```bash
    php artisan migrate
    ```

6.  **Seed the database (optional, for initial data):**

    ```bash
    php artisan db:seed
    ```

7.  **Install NPM dependencies:**

    ```bash
    npm install
    ```

8.  **Compile assets:**

    ```bash
    npm run build
    ```

9.  **Start the development server:**

    ```bash
    php artisan serve
    ```

10. **Access the admin panel:**

    * Navigate to `/admin` in your browser.
    * You may need to create an admin user through seeding, or through the command line using tinker.

## Usage

* **Frontend:** Visit the root URL of your application to browse products and place orders.
* **Admin Panel:** Access the admin panel at `/admin` to manage products, categories, orders, and users.

## Contributing

Contributions are welcome! Please feel free to submit pull requests or open issues for bugs or feature requests.

## License

[Specify your license here, e.g., MIT License]
