Laravel Simple RESTful API
==========================

Install
-----------
run "composer update" to generate /vendor folder with base laravel libraries

sqlite file already exists with customer table and 2 test entries
path for file is /app/database/production.sqlite

run "php artisan db:seed" to restore this sqlite db anytime

Default application host name is http://laravelapi

Customer API Routes
---------------------

http://laravelapi/api/v1/customers/ - GET pulls all customers

http://laravelapi/api/v1/customers/{id} - GET pulls individual customer

http://laravelapi/api/v1/customers/ - POST creates customer

http://laravelapi/api/v1/customers/{id}  - PATCH updates customer

http://laravelapi/api/v1/customers/{id} - DELETE removes individual customer

http://laravelapi/api/v1/customers/search - GET search customers by parameters


Main Code Files Paths
----------------

Routing - /app/routes.php

Customer API Controller - /app/RestApiSample/API/v1/controllers/CustomerAPIController.php

Customer DB Repository  - /app/RestApiSample/Repositories

Validation Service - /app/RestApiSample/Services/Validator


Testing
----------
API Test Controller - /app/controllers/APITestController.php

routed to http://laravelapi/apitest



