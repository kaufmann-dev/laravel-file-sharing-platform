# ITPL: Technologie: Einarbeitung
## Laravel
Laravel is a web framework written in PHP that follows the MVC pattern.
### Usecase
Building custom web apps using PHP.
### Installation
You can create a Laravel project with composer (common package manager to initialize and manage your project) with following command:
```
composer create-project laravel/laravel example-app
```
Make sure extension=fileinfo is uncommented in php.ini
### Serving 
You can serve a development server of the project with php artisan (command line interface in Laravel) with following command:
```
php artisan serve
```
The default view which will first be displayed (defined in the index route) is welcome.blade.php.

### Components
#### Blade 
Blade is the templating engine that is included with Laravel. It does not restrict plain PHP code usage in your templates. Blade uses {{ }} for echo statements to display variables passed to the view or PHP code.
```
Hello, {{ $name }}.
The current UNIX timestamp is {{ time() }}.
```
##### Blade Directives
In addition to template inheritance and displaying data, Blade also provides convenient shortcuts for common PHP control structures, such as conditional statements and loops.
```
// If statements
@if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I no have any records!
@endif
  
// Foreach
 @foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach
```
To figure out how all the directives work, visit https://laravel.com/docs/9.x/blade.
#### Routing
The route is a way of creating a request URL for your application. They are loaded by the RouteServiceProvider. All Laravel routes are defined in your route files, which are located in the routes directory. The default route is web.php. By giving routes a name, the action item in a form knows which route to point to. 
##### Example: Save item
```web.php```:
```
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
});

Route::post('/saveItemRoute', function() {
    return view('welcome');
})->name('saveItem');
```
This is how it would look if we weren’t using a controller for our items. However, we are. Therefore, we need to edit the route to hit a method inside of our controller:

```web.php```:
```
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function() {
    return view('welcome');
});

Route::post('/saveItemRoute', [ItemController::class, 'saveItem'])->name('saveItem');
```
#### Controllers
Controllers are meant to group associated request handling logic within a single class and to make your code more organized. They are stored in the app/Http/Controllers directory. The default controller is Controller.php.

To make a controller, use following command:
```
php artisan make:controller example-controller
```
##### Example: Save item
```ItemController.php```:
```
<?php

namespace App\Http\Controllers;

// Import request logic
use Illuminate\Http\Request;
// Import our model (from make:model Item)
use App\models\Item

class ItemController extends Controller
{
  	// Method for functionality
    public function saveItem(Request $request) {
      	// Create variable for new item
    	$newItem = new Item;
      	// Set properties (defined in migration)
      	$newItem -> name = $request->listItem;
      	$newItem -> is_complete = 0;
      	// Save item to database
      	$newItem -> save();
        // Return the default view
      	return view('welcome');
    }
}
```
#### Views
Views contain the html code required by your application. Views are located in the resources folder, and its path is ```resources/views```. The default view is ```welcome.blade.php```.
##### Forms
All forms in Laravel need a ```{{ csrf_field() }}``` inside of them. This is done for security reasons.
The action value is defined as a route.
###### Example: Save item
```
<form method="POST" action="{{ route("saveItem") }}">
    {{ csrf_field() }}

    <label>New List Item</label>
    <input type="text" name="listItem">
    <button type="submit">Save Item</button>
</form>
```
#### .env
You can connect a database to your Laravel application by editing the ```.env``` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
#### Models and migrations
With models, you can access tables in your database. (object relational mapping). Migrations are for creating and editing tables in your database.

Create a model and a migration with following command:
```
php artisan make:model example-model -m
```
The -m at the end will make php artisan automatically create a migration fitting the model.

Then, to run a migration, execute following command:
```
php artisan migrate
```
Now we should see the default tables in our database.

To add rows to the table you have just created, edit the Schema::create function:
```
Schema::create('example-model', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->integer('age');
    $table->timestamps();
});
```
Then migrate.
#### Logs
Laravel logs are stored inside of storage/logs/laravel.log.

To log something (in this example all of $request), do following inside PHP:
```
\Log::info(json_decode($request->all()));
```
## Livewire
Livewire is a library for Laravel that makes it simple to build reactive, dynamic interfaces using Laravel Blade as your templating language.
### Usecase
Building a dynamic and reactive application without jumping into a full JavaScript framework like Vue.
### Installation
You can add Livewire to an existing Laravel project with composer with the following command in your project directory:
```
composer require livewire/livewire
```
Then, add ```@livewireStyles``` in the ```<head>``` and add ```@livewireScripts``` in the ```<body>``` of your view.
### Livewire data structure
#### Controllers
Following the artisan command, a new folder ```app/Http/Livewire``` with ```Post.php``` as the initial file will emerge. Here we store our Livewire controllers, which are responsible for php functionality.
#### Views
Another folder that will emerge following the composer require command is ```resources/views/livewire``` with ```post.blade.php``` as the initial file. This is where our Livewire views are stored. With them we can display data to the user.
### Components
Livewire code can be stored in individual components.

Run the following artisan command to create a new Livewire component:
```
php artisan make:livewire counter
```
Running this command will generate the following two files:

```Counter.php```:
```
namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public function render()
    {
        return view('livewire.counter');
    }
}
```
```counter.blade.php```:
```
<div>
    ...
</div>
```
#### Including the component
Livewire components are very similar to Blade includes. You can insert ```<livewire:some-component />``` anywhere in a Blade view and it will render:
```
<head>
    ...
    @livewireStyles
</head>
<body>
    <livewire:counter />

    ...

    @livewireScripts
</body>
</html>
```
#### Example: Adding functionality
To add counter functionality, replace the generated content of the counter component class and view with the following:

```Counter.php```:
```
class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
```
```counter.blade.php```:
```
<div>
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
</div>
```