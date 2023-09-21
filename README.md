# Laravel v10.24.0 (PHP v8.1.10)

## Task
-  auth
-  CRUD task 
-  middleware
-  enum
-  policies

## Using Files

- migration  tasks
- Model      Task.php,User.php
- Controller TaskController.php,AuthController.php
- Requests   TaskRequest.php,RegisterRequest.php,FilterRequest.php,AuthRequest.php
- Services   TaskService.php,AuthService.php
- Enum       ResponseJson.php
- Policies   TaskPolicy.php
- Added      In custom pattern Service

## Requirements

- PHP >= 8.1

## Installation

- Just clone the project to anywhere in your computer.
- Run  composer install  <br>
- php artisan migrate
- php artisan key:generate

Now you are done.
<br>

`php artisan serve` and open the project on the browser. 

'api/task'
## Validate Task
          'status' => ['required'],
          'priority' => ['required', 'integer'],
          'title' => ['required','string'],
          'description' => ['required','string'],


## Routing 
CRUD 
'api/task/

- Login
'api/login'
- Register
'api/register'
