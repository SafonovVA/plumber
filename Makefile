env = ./.env.docker

ifneq ("$(wildcard ./.env)","")
    env = ./.env
endif

dc = docker-compose -f docker-compose.yml -f docker-compose.test.yml
test_php = docker exec -i test_php
npm = docker run --workdir /var/www --mount type=bind,source=${shell pwd},target=/var/www node npm --loglevel=warn

include ${env}
export

.PHONY: build
build:
	cp ./.env.docker ./.env
	${dc} build
	${dc} up -d --remove-orphans
	${test_php} composer install --ignore-platform-reqs --no-interaction
	${test_php} php artisan key:generate
	${test_php} php artisan migrate:fresh --seed
	${test_php} php artisan storage:link
	${test_php} php artisan optimize:clear

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
	${test_php} composer update --ignore-platform-reqs --no-interaction

.PHONY: composer-install
composer-install:
	${dc} up -d
	${test_php} composer install --ignore-platform-reqs --no-interaction

.PHONY: npm-install
npm-install:
	${dc} up -d
	${npm} install --loglevel=warn
	${npm} run dev --loglevel=warn

.PHONY: db-update
db-update:
	${dc} up -d
	${test_php} php artisan migrate:fresh --seed

.PHONY: test
test:
	${test_php} php artisan test --stop-on-failure

.PHONY: optimize-clear
optimize-clear:
	${test_php} php artisan optimize:clear
