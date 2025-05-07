<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🛍️ Window Shopping App – Laravel API

This is a backend API built with **Laravel** for a simple e-commerce-like ordering system. It demonstrates clean code
practices, SOLID principles, and well-structured OOP architecture. The system allows users to create orders and retrieve
them, with detailed product information stored at the time of purchase.

---

## 🛠 Tech Stack

- **Laravel 12**
- PHP 8.4+
- MySQL

---

## 🧱 Architecture

This project uses **Service Layer Pattern** with the following structure:

Responsibilities are clearly divided between controllers, services, and data layers for maintainability and testability.

---

## 🧠 Design Principles

This project strictly follows **SOLID** principles:

- **S**: *Single Responsibility* – Each class has a single reason to change.
- **O**: *Open/Closed* – The code is open for extension, closed for modification.
- **L**: *Liskov Substitution* – Interfaces are respected and safely interchangeable.
- **I**: *Interface Segregation* – Services rely on small, purpose-built interfaces.
- **D**: *Dependency Inversion* – High-level modules depend on abstractions.

### ✅ Other Patterns Used

- **DTOs** for request validation and transformation
- **Resource classes** for consistent response formatting
- **Exception handling** via Laravel's logging and try-catch in controllers

---

## Instalation

```git clone git@github.com:Mk-Mkrtich/WindowShopApp.git ```\
```cd window-shopping-app```\
```composer install```\
```cp .env.example .env```\
```php artisan key:generate```\
```php artisan migrate --seed```\
```php artisan serve```

## 📦 API Endpoints

### 🔁 Create Order

- **POST** `/api/login`
- **Request Body:**

```json
{
    "username": "TestUserName",
    "password": "password"
}
```

- **Response:**

```json
{
    "data": {
        "id": 1,
        "username": "TestUserName",
        "email": "carli00@example.org",
        "token": "eyJ0eXAiOiJKV1QiLCJh...",
        "created_at": "2025-05-07 10:12:31"
    },
    "success": true,
    "message": "Login successful"
}
```

- **GET** `/api/products`

- **Response:**

```json
{
    "data": [
        {
            "id": 1,
            "name": "E-Product: numquam porro",
            "price": "22.17",
            "type": "digital"
        },
        {
            "id": 2,
            "name": "Physical Product: harum officia",
            "price": "423.92",
            "type": "physical",
            "meta": {
                "dimension": "30x20x2 cm"
            }
        }
    ]
}
```

- **POST** `/api/basket`
- **Request Body:**

```json
{
    "product_id": 1,
    "quantity": 2
}
```

- **Response:**

```json
{
    "message": "Added"
}
```

- **POST** `/api/basket`
- **Request Body:**

```json
{
    "product_id": 1,
    "quantity": 2
}
```

- **Response:**

```json
{
    "message": "Added to basket"
}
```

- **GET** `/api/basket`

- **Response:**

```json
{
    "data": [
        {
            "quantity": 5,
            "product_id": 1
        }
    ],
    "success": true,
    "message": "Basket product list"
}
```

- **DELETE** `/api/basket/1`

- **Response:**

```json
{
    "message": "Product was removed"
}
```

- **DELETE** `/api/basket/`

- **Response:**

```json
{
    "message": "Basket was cleared"
}
```


- **POST** `/api/order`
- **Request Body:**

```json
{
    "product_ids": [
        1,
        2,
        3
    ]
}
```

- **Header:**

```json
{
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJI..."
}
```

- **Response:**

```json
{
    "message": "success"
}
```


- **GET** `/api/order`

- **Header:**

```json
{
    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJI..."
}
```

- **Response:**

```json
{
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "products": [
                {
                    "id": 1,
                    "name": "E-Product: numquam porro",
                    "price": "86.17",
                    "type": "digital"
                },
                {
                    "id": 2,
                    "name": "Physical Product: harum officia",
                    "price": "423.92",
                    "type": "physical",
                    "meta": {
                        "dimension": "30x20x2 cm"
                    }
                }
            ]
        },
        {
            "id": 2,
            "user_id": 1,
            "products": [
                {
                    "id": 1,
                    "name": "E-Product: numquam porro",
                    "price": "86.17",
                    "type": "digital"
                },
                {
                    "id": 2,
                    "name": "Physical Product: harum officia",
                    "price": "423.92",
                    "type": "physical",
                    "meta": {
                        "dimension": "30x20x2 cm"
                    }
                }
            ]
        }
    ]
}
```



👤 Author

Mkrtich Mkrtchyan

Software Engineer — Clean Code Enthusiast
GitHub: @Mk-Mkrtich
