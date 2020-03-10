# WI Taxonomy Search
 Wildlife Insights Taxonomy Search Application

composer install
composer update
Create MySQL Database on Database Server and set connection in .env
php artisan key:generate
composer require laravel/ui --dev
php artisan ui:auth
php artisan vendor:publish
php artisan migrate
php artisan passport:install
npm install
bower install
npm run dev

Uses the following packages (refer to package documentation for additional install and configuration information)
Telescope and Passport are included, but not utilized by the base application
"babenkoivan/scout-elasticsearch-driver": "^4.0",
"barryvdh/laravel-cors": "^0.11.4",
"laravel/passport": "^8.0",
"laravel/scout": "^7.2",
"laravel/telescope": "^2.1",
"laravelcollective/html": "^6.0",
"spatie/laravel-http-logger": "^1.3",
"spatie/laravel-permission": "^3.3",

Elasticsearch
This application utilizes elasticsearch service provided by elastic cloud (https://www.elastic.co/cloud/) for search functionality. The search UI is built using Vue.js supported by Laravel on the server-side.
To build the search engine, create the mysql table, populate table with searchable data, create index using scout, then transfer that index to the elastic cloud.

Edit the following configuration files
Add and populate the following variables in to the .env file
SCOUT_DRIVER=elastic
ELASTICSEARCH_INDEX=
SCOUT_ELASTIC_HOST=
ELASTICSEARCH_HOST=
