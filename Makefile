env = ./.env.docker

ifneq ("$(wildcard ./.env)","")
    env = ./.env
endif

dc = docker-compose -f docker-compose.yml -f docker-compose.override.yml
app_run = ${dc} up -d --remove-orphans
app_stop = ${dc} down --remove-orphans
php_container = docker exec -i $(APP_NAME)_php
npm = docker run --rm --name $(APP_NAME)_npm --workdir /var/www --mount type=bind,source=${shell pwd},target=/var/www node npm --loglevel=warn

include ${env}
export

.PHONY: build
build:
	cp ./.env.docker ./.env
	${dc} build
	${app_run}
	${php_container} composer install --ignore-platform-reqs --no-interaction
	${php_container} php artisan key:generate
	${php_container} php artisan migrate:fresh --seed
	${php_container} php artisan storage:link
	${php_container} php artisan optimize:clear
	${npm} install
	${npm} run build
	echo "Build completed."

.PHONY: up
up:
	${app_run}

.PHONY: rebuild
rebuild:
	${app_stop}
	${dc} build
	${app_run}

.PHONY: down
down:
	${app_stop}

.PHONY: restart
restart:
	${app_stop}
	${app_run}

.PHONY: composer-update
composer-update:
	${app_run}
	${php_container} composer update --ignore-platform-reqs --no-interaction

.PHONY: composer-install
composer-install:
	${app_run}
	${php_container} composer install --ignore-platform-reqs --no-interaction

.PHONY: npm-run-dev
npm-run-dev:
	${app_run}
	${npm} install
	${npm} run dev

.PHONY: npm-run-build
npm-run-build:
	${app_run}
	${npm} install
	${npm} run build

.PHONY: db-update
db-update:
	${app_run}
	${php_container} php artisan migrate:fresh --seed

.PHONY: test
test:
	${php_container} php artisan test --stop-on-failure

.PHONY: optimize-clear
optimize-clear:
	${php_container} php artisan optimize:clear
