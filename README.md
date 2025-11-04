# Laravel ID Generator

[![Latest Stable Version](https://img.shields.io/packagist/v/omaressaouaf/laravel-id-generator.svg)](https://packagist.org/packages/omaressaouaf/laravel-id-generator)
[![License](https://img.shields.io/github/license/omaressaouaf/laravel-id-generator)](LICENSE)
[![Tests](https://github.com/omaressaouaf/laravel-id-generator/actions/workflows/tests.yml/badge.svg)](https://github.com/omaressaouaf/laravel-id-generator/actions/workflows/tests.yml)

A Laravel package for generating **custom auto-incrementing IDs** with prefixes, suffixes, and date-based placeholders.

## 🚀 Features
- Auto-increment ID generation for any column.
- Allow custom prefixes & suffixes & padding
- Supports **{DATE}**, **{MONTH}**, and **{YEAR}** placeholders.

---

## 📥 Installation

Install via Composer:

```sh
composer require omaressaouaf/laravel-id-generator
```

---

## 📌 Usage

### Basic Example
Generate an ID with a **prefix and suffix and padding**:

```php
use Omaressaouaf\LaravelIdGenerator\IdGenerator;
use App\Models\User;

$id = IdGenerator::generate(Invoice::class, 'column_name', 5, 'INV-', '-2024');

echo $id; // INV-00001-2024
```

### Dynamic Placeholders
- `{DATE}` → `2025-02-28`
- `{MONTH}` → `2025-02`
- `{YEAR}` → `2025`

```php
$id = IdGenerator::generate(Invoice::class, 'column_name', 5, 'INV-{YEAR}-');
echo $id; // INV-2025-00001
```

### Initial starting point
Start from a specific number if there is no ID found in DB

```php
$id = IdGenerator::generate(Invoice::class, 'column_name', 5, 'INV-', '', 5);
echo $id; // INV-2025-00005
```

### Generators

After installation, you can publish the package configuration file using:

```bash
php artisan vendor:publish --provider="Omaressaouaf\LaravelIdGenerator\LaravelIdGeneratorServiceProvider"
```

This will create a configuration file in `config/laravel-id-generator.php`, allowing you define custom generators for different tables or models.

```php
return [
    Invoice::class => [
        'field' => 'number',
        'padding' => 5,
        'prefix' => 'INV-',
        'suffix' => '-{YEAR}',
        'initial-starting-point' => 1
    ],
    'receipts' => [
        'field' => 'number',
        'padding' => 3,
        'prefix' => 'RC-',
    ]
];
```

Then you can use the generator

```php
$id = IdGenerator::generateFromConfig(Invoice::class);
echo $id; // INV-00001-2025
```

---

## 🛠️ Testing

Run unit tests:

```sh
composer test
```

---

## 📜 License

This package is licensed under the [MIT License](https://github.com/omaressaouaf/laravel-id-generator/blob/master/LICENSE).
