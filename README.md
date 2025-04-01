

# JustSwim

Aplikacja internetowe napisana przy użyciu PHP + Laravel na zawody pływania

## Funkcje
Możliwe że nie wwszystko dodane jeszcze:

- Dodawanie, wyświetlanie, usuwanie zawodników
- Dodawanie, wyświetlanie, usuwanie drużyn
- Przypisywanie zawodników do drużyn
- Dodawanie, wyświetlanie, usuwanie zawodów
  

## TODO:

- ### landing page [LINK](./resources/views/index.blade.php):
    - Wyświetlanie najbliższych zawodów
    - Wyświetlanie statystyk (ile zawodników, drużyn, zawodów dodanych w bazie)
    - Krótki opis podstron może?? nwm
- ### wybranie jakiejś ikony logo itd

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalacja:

1. Potrzebne: [git](https://git-scm.com/), ([github cli](https://cli.github.com/) też fajne), php, laravel, composer (można w powershell jako admin wpisać `Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))`) i [xampp](https://www.apachefriends.org/pl/index.html)
2. ściągnąć repozytorium do htdocs (przez GitHub CLI: `gh repo clone Wojtek2006/JustSwim` albo po prostu pobrać zip ale może czasem pobrać bez folderu `.git` )
3. w folderze `JustSwim` odpalić:
   1. `composer install`
   2. `cp .env.example .env`
   3. `php artisan key:generate`
   4. `php artisan migrate`
   5. `composer update`
4. chyba tyle, odaplić xampp i działa raczej pod adresem `localhost/JustSwim/public`