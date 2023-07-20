# Project initialization
## Make sure php_fileinfo.dll is enabled
Enable the extension in ```php.ini```
```
extension=php_fileinfo.dll
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
Complete .env with credentials
```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```