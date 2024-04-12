# Preston

An integrated Arabic movie website project, first version. The project was programmed using the Laravel framework, version 10.
The project consists of:
- The front end of the site, in which all posts are displayed in a modern way, taking into account the principles of UI/UX.

- The control panel, which facilitates the complete management of the site and monitoring all statistics.

> The project contains all the basics that the programmer needs to implement such a project at a rate exceeding 90%, and the rest is added by the programmer himself according to his needs.

- Dark Mode.
- Fully Responsive.

![alt text](https://github.com/ahmedelsewailky/movie-one/blob/master/public/screenshots/screen_dashboard.PNG?raw=true)

![alt text](https://github.com/ahmedelsewailky/movie-one/blob/master/public/screenshots/screen_website.png?raw=true) 

![alt text](https://github.com/ahmedelsewailky/movie-one/blob/master/public/screenshots/screen_single.PNG?raw=true)

## Installation
- Make a clone from respository.
```bash
git@github.com:ahmedelsewailky/movie-one.git
```
- Downloading packages and requirements.
```bash
composer update
```
- Creating a copy of .env.example file to `.env` .
```bash
cp .env.example .env
```
- Generate your .env file key.
```bash
php artisan key:generate
```
- Publishing storage.
```bash
php artisan storage:link
```
- Create database with name `laravel`.
```bash
php artisan migrate --seed
```
- Runing server.
```bash
php artisan serv
```

## Packages

| Package Name | Verison |
| ------------ | ------- |
|laravel|10.x|


## Plugins

| Name |   |
| ---- | - |
|Bootstrap|https://getbootstrap.com/|
|jQuery|https://jquery.com/|
|Select2|https://select2.org/|

## License
MIT
