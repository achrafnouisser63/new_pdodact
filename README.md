# CommerceHub - Laravel E-commerce Platform

A portfolio-ready e-commerce application built with **Laravel 10**, **PHP 8.1+**, **MySQL**, Bootstrap and Vite.  
The project demonstrates product/catalog administration, customer-facing browsing, contact management and a transactional order API with stock control.

## Key Features

- Public product catalog and product detail pages
- Category management
- Admin product CRUD
- Authentication and admin profile management
- Customer contact/message inbox
- Product stock tracking
- Order and order-item persistence
- Transaction-safe checkout
- Stock validation with row locking to prevent overselling
- Automatic stock decrement after a successful order
- Order status workflow: pending, paid, processing, shipped, completed, cancelled
- JSON REST endpoints for order management

## Backend Architecture

The checkout flow is implemented as a database transaction:

1. Validate customer and cart payload.
2. Lock each requested product row.
3. Verify available stock.
4. Calculate line totals and order subtotal.
5. Persist the order and order items.
6. Decrement stock atomically.
7. Return the created order with its items.

This protects inventory consistency when multiple customers order at the same time.

## REST API

### Create an order

`POST /api/orders`

```json
{
  "customer_name": "Sara El Amrani",
  "customer_email": "sara@example.com",
  "customer_phone": "+212600000000",
  "items": [
    {
      "produit_id": 1,
      "quantity": 2
    }
  ]
}
```

### Other endpoints

- `GET /api/orders` - paginated order list
- `GET /api/orders/{order}` - order details
- `PATCH /api/orders/{order}/status` - update workflow status

## Tech Stack

- PHP 8.1+
- Laravel 10
- Eloquent ORM
- MySQL / MariaDB
- Laravel Sanctum
- Bootstrap 5
- Vite
- Axios
- PHPUnit

## Main Domain Models

- Produit
- Category
- Order
- OrderItem
- Customer messages
- User / Admin

## Local Setup

```bash
git clone https://github.com/achrafnouisser63/new_pdodact.git
cd new_pdodact

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Configure the database in `.env`, then run:

```bash
php artisan migrate
npm run dev
php artisan serve
```

## Portfolio Focus

This repository is intended to demonstrate practical Laravel backend skills including:

- MVC architecture
- REST API design
- relational data modeling
- validation
- transactional business logic
- authentication
- inventory consistency
- maintainable routing and controllers

## Author

**Achraf Nouisser**  
Web Developer - Laravel / PHP / JavaScript / Node.js / Python

- GitHub: https://github.com/achrafnouisser63
- Portfolio: https://www.canva.com/d/Xu6tPZ9s5Zu60wK
