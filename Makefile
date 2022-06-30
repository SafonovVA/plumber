env = ./.env.docker

ifneq ("$(wildcard ./.env)","")
    env = ./.env
endif

dc = docker-compose -f docker-compose.yml -f docker-compose.override.yml
php = docker exec -i $(APP_NAME)_php
npm = docker run --workdir /var/www --mount type=bind,source=${shell pwd},target=/var/www node npm --loglevel=warn

include ${env}
export

.PHONY: build
build:
	cp ./.env.docker ./.env
	${dc} build
	${dc} up -d --remove-orphans
	${php} composer install --ignore-platform-reqs --no-interaction
	${php} php artisan key:generate
	${php} php artisan migrate:fresh --seed
	${php} php artisan storage:link
	${php} php artisan optimize:clear

.PHONY: up
up:
	${dc} up -d

.PHONY: rebuild
rebuild:
	${dc} down
	${dc} build
	${dc} up -d --remove-orphans

.PHONY: down
down:
	${dc} down

.PHONY: restart
restart:
	${dc} down
	${dc} up -d --remove-orphans

.PHONY: composer-update
composer-update:
	${dc} up -d
	${php} composer update --ignore-platform-reqs --no-interaction

.PHONY: composer-install
composer-install:
	${dc} up -d
	${php} composer install --ignore-platform-reqs --no-interaction

.PHONY: npm-install
npm-install:
	${dc} up -d
	${npm} install --loglevel=warn
	${npm} run dev --loglevel=warn

.PHONY: db-update
db-update:
	${dc} up -d
	${php} php artisan migrate:fresh --seed

.PHONY: test
test:
	${php} php artisan test --stop-on-failure

.PHONY: optimize-clear
optimize-clear:
	${php} php artisan optimize:clear
