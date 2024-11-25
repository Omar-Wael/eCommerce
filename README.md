## Project Title: Laravel E-Commerce Application

### Table of Contents

- [Project Title: Laravel E-Commerce Application](#project-title-laravel-e-commerce-application)
  - [Table of Contents](#table-of-contents)
  - [Introduction](#introduction)
  - [Features](#features)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Invoice Management](#invoice-management)
  - [Database Schema](#database-schema)
    - [Users Table:](#users-table)
    - [Products Table:](#products-table)
    - [Cart Table:](#cart-table)
  - [Technologies Used](#technologies-used)
  - [Contributing](#contributing)
  - [License](#license)
  - [Contact](#contact)

* * *

### Introduction

This project is a fully-featured **Laravel E-Commerce Application** that allows users to browse products by category, add them to a cart, manage their cart, and generate invoices. It features a dynamic, responsive Arabic user interface designed to streamline the shopping process. The application includes user authentication, cart functionality, and customizable invoices styled for Arabic localization.

* * *

### Features


*   **Product Management**:
    *   View product listings with images and Arabic descriptions.
    *   Add items to the cart with customizable quantities.
*   **Cart Management**:
    *   View, update, and remove items from the cart.
    *   Calculate cart totals with tax integration.
*   **Invoice Management**:
    *   Generate professional invoices in Arabic.
    *   Includes detailed product descriptions, quantities, pricing, and taxes.

* * *

### Prerequisites

Before you begin, ensure you have the following installed:

*   PHP (>= 8.1)
*   Composer
*   Laravel (>= 10.x)
*   MySQL/MariaDB
*   Node.js and npm (for front-end assets)
*   A web server like Apache or Nginx

* * *

### Installation

1.  **Clone the Repository**:
    
    bash
    
    Copy code
    
    `git clone https://github.com/Omar-Wael/eCommerce.git cd eCommerce`
    
2.  **Install Dependencies**:
    
    ```bash
    composer install npm install
    ```
    
    
3.  **Set Environment Variables**: Copy the `.env.example` file to `.env`:
    
    ```bash
    cp .env.example .env
    ```
    
    Update the `.env` file with your database credentials and other necessary configurations.
    
1.  **Run Migrations**:
    
    ```bash
    php artisan migrate --seed
    ```
    
2.  **Build Frontend Assets**:
    
    ```bash
    npm run dev
    ```
    
3.  **Run the Application**:
    
    ```bash    
    php artisan serve
    ```
    
4.  **Access the Application**: Visit `http://127.0.0.1:8000` in your browser.
    

* * *

### Usage

*   **Authentication**:
    *   Register or log in as a user.
    *   Update your profile with your address and company details.
*   **Browse Products**:
    *   View the product listing page with product images and Arabic descriptions.
*   **Add to Cart**:
    *   Select quantities and add products to your cart.
*   **Manage Cart**:
    *   View, update, or remove items from the cart.
*   **Generate Invoice**:
    *   After finalizing your cart, generate a professional Arabic invoice.

* * *


### Invoice Management

The invoice feature allows users to view and download professional invoices styled for Arabic localization.  
Invoice fields include:

*   Product description, quantity, price, and total.
*   User address and company details.
*   Tax and grand total calculations.

* * *

### Database Schema

#### Users Table:

| Field   | Type   | Description         |
| ------- | ------ | ------------------- |
| name    | String | User's name         |
| email   | String | User's email        |
| address | String | User's address      |
| company | String | User's company name |

#### Products Table:

| Field | Type   | Description              |
| ----- | ------ | ------------------------ |
| name  | String | Product name (in Arabic) |
| price | Float  | Product price            |
| pic   | String | Path to product image    |

#### Cart Table:

| Field      | Type    | Description                   |
| ---------- | ------- | ----------------------------- |
| product_id | Integer | ID of the product in the cart |
| quantity   | Integer | Quantity of the product       |

* * *

### Technologies Used

*   **Backend**:
    *   Laravel
    *   MySQL
*   **Frontend**:
    *   Tailwind CSS / Bootstrap
    *   Blade Templates
    *   Vue.js
*   **Localization**:
    *   RTL and Arabic support

* * *

### Contributing

Contributions are welcome! To contribute:

1.  Fork the repository.
2.  Create a new branch: `git checkout -b feature-name`.
3.  Commit your changes: `git commit -m 'Add some feature'`.
4.  Push to the branch: `git push origin feature-name`.
5.  Open a pull request.

* * *

### License

This project is licensed under the MIT License.

* * *

### Contact

For any inquiries or support, feel free to contact:  
**Omar Wael**  
**Email**: omarwael1994@yahoo.com
