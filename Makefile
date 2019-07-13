build:
	docker build --tag=nginx .

sniffer:
	docker-compose exec nginx /srv/www/vendor/bin/phpcs --standard=PSR2 /srv/www/src/ /srv/www/config/

stan:
	docker-compose exec nginx /srv/www/vendor/bin/phpstan analyze /srv/www/src/ -l 7