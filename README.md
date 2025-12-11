# Dynamic Task Widget

A Laravel project to manage dynamic task widgets with responsive design and interactive UI.

## Prerequisites

> This Project Required Composer To Be Installed And PHP 8.2 Or Above

-   PHP 8.2 Or Above
-   [Composer](https://getcomposer.org/)
-   [Node.js and npm](https://nodejs.org/) (for building assets)

## Installation

### Clone The Project

```bash
git clone https://github.com/Yossif-Hagag/dynamic-task-widget.git
cd dynamic-task-widget
```

### Install Composer Dependencies

```bash
composer install

```

### Create .env Then Edit It

```bash
cp .env.example .env
```

### Generate Laravel Key

```bash
php artisan key:generate
```

### Migrate The DB

```bash
php artisan migrate
```

OR

### Migrate The DB With Seed

```bash
php artisan migrate --seed
```

### Link Storage

```bash
php artisan storage:link
```

### Install Node Dependencies & Build Assets

```bash
npm install
npm run build
```

### Run The Server

```bash
php artisan serve
```
