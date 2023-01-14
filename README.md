## Step by Step


clone project


Enter the project folder

```bash
cd book-store-api-test/
```

Install dependencies

```bash
composer i or composer install
```

Set variables

```bash
cp .env.example .env
```

Generate secret key Laravel app



Sample Setup Variables Database
```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=root
```
Run to populate the database
```bash
php artisan migrate --seed

```

Up server

```bash
php artisan serve
```
go to the root of the page
```bash
http://127.0.0.1:8000
```
#All users created using seeder, password is "password"!

Login
```bash
http://127.0.0.1:8000/api/auth/login
```
Body example login:
```json
{
    "email": "larkin.dan@example.com",
    "password": "password"
}
```
Logout
```bash
http://127.0.0.1:8000/api/auth/logout
```
## Routes Users

| Route                  | Handler                    | Middleware | Name             | 
| ---------------------- | -------------------------- | ---------- | ---------------- | 
| GET /api/bookstore           | BookStoreController.index   | auth:sanctum       | bookstore.index   |        
| POST /api/bookstore          | BookStoreController.store   | auth:sanctum       | bookstore.store   |        
| PUT /api/bookstore/{id} | BookStoreController.update  | auth:sanctum       | bookstore.update  |        
| GET /api/bookstore/{id} | BookStoreController.show  | auth:sanctum       | bookstore.show  |        |
| DELETE /api/bookstore/{id}    | BookStoreController.destroy | auth:sanctum       | bookstore.destroy |        

Body example bookstore:
```json
{
    "name": "O Conde de Monte Cristo",
    "isbn": "1101010010009",
    "value": "10.00"
}
```
