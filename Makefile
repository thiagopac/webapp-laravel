# Prepare for production
production: ensure-composer ensure-permissions enable-cache build-assets

ensure-composer:
	composer update --ignore-platform-req=php --optimize-autoloader

ensure-permissions:
	chmod -R o+w storage

enable-cache:
	#php artisan optimize

build-assets:
	npm update
	npm run prod --demo2 --rtl --dark-mode
