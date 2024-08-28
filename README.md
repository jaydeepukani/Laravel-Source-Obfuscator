# Laravel Source Obfuscator

[![StyleCI](https://github.styleci.io/repos/848640738/shield?branch=main)](https://github.styleci.io/repos/848640738)
[![Latest Stable Version](https://poser.pugx.org/jaydeepukani/laravel-source-obfuscator/v/stable)](https://packagist.org/packages/jaydeepukani/laravel-source-obfuscator)
[![License](https://poser.pugx.org/jaydeepukani/laravel-source-obfuscator/license)](https://github.com/jaydeepukani/Laravel-Source-Obfuscator)
[![CodeFactor](https://www.codefactor.io/repository/github/jaydeepukani/laravel-source-obfuscator/badge)](https://www.codefactor.io/repository/github/jaydeepukani/laravel-source-obfuscator)

!["Cover"](cover.jpg)

This package is forked from [sbamtr/laravel-source-obfuscator](https://github.com/SiavashBamshadnia/Laravel-Source-Encrypter)
This package encrypts your php code with [phpBolt](https://phpbolt.com)

For Laravel 6, 7, 8, 9, 10, 11

* [Installation](#installation)
* [Usage](#usage)

## Installation

### Step 1

At the first, You have to [install phpBolt](https://phpbolt.com/download-phpbolt/).

### Step 2

Require the package with composer using the following command:

```bash
composer require --dev jaydeepukani/laravel-source-obfuscator
```

### Step 3

#### For Laravel

The service provider will automatically get registered. Or you may manually add the service provider in your `config/app.php` file:

```php
'providers' => [
    // ...
    \JaydeepUkani\LaravelSourceObfuscator\SourceEncryptServiceProvider::class,
];
```

### Step 4 (Optional)

You can publish the config file with this following command:

```bash
php artisan vendor:publish --provider="JaydeepUkani\LaravelSourceObfuscator\SourceEncryptServiceProvider" --tag=config
```

## Usage

Open terminal in project root and run this command:

```bash
php artisan encrypt-source
```

This command encrypts files and directories in `config/source-obfuscator.php` file. Default values are `app`, `database`, `routes`.

The default destination directory is `encrypted`. You can change it in `config/source-obfuscator.php` file.

Also the default encryption key length is `6`. You can change it in `config/source-obfuscator.php` file. `6` is the recommended key length.

This command has these optional options:

| Option      | Description                                                          | Example                 |
|-------------|----------------------------------------------------------------------|-------------------------|
| source      | Path(s) to encrypt                                                   | app,routes,public/a.php |
| destination | Destination directory                                                | encrypted               |
| keylength   | Encryption key length                                                | 6                       |
| force       | Force the operation to run when destination directory already exists |                         |

### Usage Examples

| Command                                                       | Description                                                                                                       |
|---------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------|
| `php artisan encrypt-source`                                  | Encrypts with default source, destination and keylength. If the destination directory exists, asks for delete it. |
| `php artisan encrypt-source --force`                          | Encrypts with default source, destination and keylength. If the destination directory exists, deletes it.         |
| `php artisan encrypt-source --source=app`                     | Encrypts `app` directory to the default destination with default keylength.                                       |
| `php artisan encrypt-source --destination=dist`               | Encrypts with default source and key length to `dist` directory.                                                  |
| `php artisan encrypt-source --destination=dist --keylength=8` | Encrypts default source to `dist` directory and the encryption key length is `8`.                                 |
