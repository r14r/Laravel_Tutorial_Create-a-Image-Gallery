default:
	cat Makefile

start:
	php artisan serve

migrate:
	php artisan migrate

links:
	php artisan storage:link

