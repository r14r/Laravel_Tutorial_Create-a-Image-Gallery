

## 

laravel new App --jet --stack livewire --teams


## Datbase Configuration
```
DB_CONNECTION=sqlite
```

```
$ touch database/database.sqlite
$ php artisan migrate
```


## Install Laravel Plugin

```
composer require sven/artisan-view --dev
```

## E-Mail Verification

Add MusrtVerfyEmail to User-Model

```
app/Models/Users.php:

class User extends Authenticatable implements MustVerifyEmail
```

```
config/fortify.php:

    'features' => [
        Features::registration(),
        Features::resetPasswords(),
        Features::emailVerification(),

```
config/jetstream.php:

    'features' => [
        Features::termsAndPrivacyPolicy(),
```

## Add new page

```
php artisan make:view images.index
```

## Add new page to routing

```routes/web.php```

```
Route::get('/images', function () {
    return view('images.index');
})->name('images');
```

## Add new page to navigation menu

```
<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-jet-nav-link>
</div>

<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-jet-nav-link href="{{ route('images') }}" :active="request()->routeIs('images')">
        {{ __('Images') }}
    </x-jet-nav-link>
</div>
```


## Make link to access images in storage

```
php artisan storage:link
```

## Create sample image unter /storage/app/public/images

## Add Image Link to images.index.php view

```resources/views/images/index.blade.php```

```
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- http://localhost:8002/storage/images/intro.png -->
                Images: <img src="{{ '/storage/images/intro.png'}}" height="100px" alt="" title=""></a>
            </div>
        </div>
    </div>
</x-app-layout>
```


### Create Controller for View

```
php artisan make:controller ImageViewController
```

### Create Images Model

```
php artisan make:model Images
```