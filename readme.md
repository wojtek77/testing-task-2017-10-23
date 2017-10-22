## Laravel 5.5 - testing task

#### Task content

Stwórz proszę aplikację, w której będzie można dodawać drużyny i zawodników. Drużyna musi mieć nazwę. Po dodaniu drużyny, można do niej dodać maksymalnie trzech zawodników. Zawodnik musi należeć do drużyny, musi mieć imię i nazwisko oraz pole wiek, które nie jest wymagane. Powinna być też możliwość usuwania zawodników oraz drużyn. Usunięcie drużyny powinno też skutkować usunięciem zawodników należących do tej drużyny.
 

#### Installation

	git clone https://github.com/wojtek77/testing-task-2017-10-23.git
    cd testing-task-2017-10-23
    composer install
    cp .env.example .env


#### Docker

    cd docker/
    docker-compose build
    docker-compose up -d
    # create database "laravel_testing_task" in phpMyAdmin http://<172.18.0.1>:8080
    docker exec -it docker_wojtek77-php_1 bash
    cd /src/
    php artisan migrate
    exit


#### WWW

    http://<172.18.0.1>/admin


#### phpunit

    docker exec -it docker_wojtek77-php_1 bash
    cd /src/
    ./vendor/bin/phpunit
    exit