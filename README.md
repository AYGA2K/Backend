<!--toc:start-->

-   [Description](#description)
-   [Dependencies](#dependencies)
-   [Setup Instructions](#setup-instructions)
    -   [Clone the Repository](#clone-the-repository)
    -   [Install Dependencies](#install-dependencies)
    -   [Copy Environment File](#copy-environment-file)
    -   [Generate Application Key](#generate-application-key)
    -   [Start Laravel Sail](#start-laravel-sail)
    -   [Run Migrations](#run-migrations)
    -   [Access the Application](#access-the-application)
    -   [Stop Laravel Sail](#stop-laravel-sail)
-   [API Endpoints](#api-endpoints)
    -   [Users](#users)
    -   [QR Codes](#qr-codes)
    -   [Covid Flags](#covid-flags)
    <!--toc:end-->

## Description

This project is a Laravel application that provides APIs to manage users, QR codes, and Covid flags securely in the database.

## Dependencies

-   Composer
-   Docker

## Setup Instructions

Follow these steps to set up and run the project:

### Clone the Repository

```bash
git clone <repository_url>
cd <project_directory>
```

### Install Dependencies

```bash
composer install
```

### Copy Environment File

```bash
cp .env.example .env
```

### Install Sail

```bash
composer require laravel/sail --dev
php artisan sail:install
```

### Start Laravel Sail

```bash
./vendor/bin/sail up
```

### Run Migrations

```bash
./vendor/bin/sail artisan migrate
```

### Access the Application

The application should now be running and accessible at http://localhost:8080. You can use the specified API endpoints to interact with the application.

### Stop Laravel Sail

```bash
./vendor/bin/sail down
```

## API Endpoints

Below are the available API endpoints:

### Users

-   GET /api/users
-   POST /api/users
-   GET /api/users/{id}
-   PUT /api/users/{id}
-   DELETE /api/users/{id}

### QR Codes

-   GET /api/qrcodes
-   POST /api/qrcodes
-   GET /api/qrcodes/{id}
-   PUT /api/qrcodes/{id}
-   DELETE /api/qrcodes/{id}

### Covid Flags

-   GET /api/covidflags
-   POST /api/covidflags
-   GET /api/covidflags/{id}
-   PUT /api/covidflags/{id}
-   DELETE /api/covidflags/{id}
