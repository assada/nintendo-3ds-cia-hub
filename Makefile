up:
	docker-compose up -d
build:
	docker-compose build
stop:
	docker-compose stop
bash:
	docker-compose exec php-fpm bash