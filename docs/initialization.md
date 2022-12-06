# Project initialization
## Make sure need PHP extensions are enabled
Enable the extensions in ```php.ini```
```
// for composer to work
extension=php_fileinfo.dll

// for migrations to work
extension=php_pdo_mysql.dll
```
## Load missing project files
```
cd 02_filesharing
composer install
```
## .env
### Rename
Rename ```.env.example``` to ```.env```
## Complete file
Complete ```.env``` with credentials
```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```