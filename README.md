<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Student CRUD Restfull API
build with Laravel 7.28 and MySql Database

## Instalation
- Clone this repository
> $ git clone https://github.com/prasetiyo28/students-api.git

- install dependency 
> $ composer install

- copy .env and adjust with your db config
> $ cp .example.env .env

## Migration
> $ php artisan migrate

## Running
> $php artisan serve

## API
- Read All Data Students
> '/api/students'   
method : GET

- Read Student Profile
> '/api/students/{id}'   
method : GET

- Register Student
> '/api/students'   
method : POST   
body :  
{  
    "student_number" : "15090003",  
    "email" : "example@email.com",  
    "name" : "Example Students",  
    "gender" : "Male",  
    "address" : "Example City" .   
}

- Update Student
> '/api/students'   
method : PUT   
body :  
{  
    "id" : "3",  
    "student_number" : "15090003",  
    "email" : "example@email.com",  
    "name" : "Example Students",  
    "gender" : "Male",  
    "address" : "Example City" .   
}

- Delete Student Profile
> '/api/students/{id}'   
method : DELETE

## Postman Collection
postman collection can be download on

> [Link Documentation](https://www.getpostman.com/collections/960b88ab0246318272be)
