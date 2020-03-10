# WI Taxonomy Search
 Wildlife Insights Taxonomy Search Application

composer install<br/>
composer update<br/>
Create MySQL Database on Database Server and set connection in .env<br/>
php artisan key:generate<br/>
composer require laravel/ui --dev<br/>
php artisan ui:auth<br/>
php artisan vendor:publish<br/>
php artisan migrate<br/>
php artisan passport:install<br/>
npm install<br/>
bower install<br/>
npm run dev<br/>

Uses the following packages (refer to package documentation for additional install and configuration information)<br/>
Telescope and Passport are included, but not utilized by the base application<br/>
"babenkoivan/scout-elasticsearch-driver": "^4.0",<br/>
"barryvdh/laravel-cors": "^0.11.4",<br/>
"laravel/passport": "^8.0",<br/>
"laravel/scout": "^7.2",<br/>
"laravel/telescope": "^2.1",<br/>
"laravelcollective/html": "^6.0",<br/>
"spatie/laravel-http-logger": "^1.3",<br/>
"spatie/laravel-permission": "^3.3",<br/>
<br/>
Elasticsearch<br/>
This application utilizes elasticsearch service provided by elastic cloud (https://www.elastic.co/cloud/) for search functionality. The search UI is built using Vue.js supported by Laravel on the server-side.<br/>
To build the search engine, create the mysql table, populate table with searchable data, create index using scout, then transfer that index to the elastic cloud.<br/>
<br/>
Add and populate the following variables in to the .env file<br/>
SCOUT_DRIVER=elastic<br/>
ELASTICSEARCH_INDEX=<br/>
SCOUT_ELASTIC_HOST=<br/>
ELASTICSEARCH_HOST=<br/>
