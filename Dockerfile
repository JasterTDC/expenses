FROM "richarvey/nginx-php-fpm"

ADD /conf/expenses.conf /etc/nginx/sites-available/expenses.conf

RUN mkdir /srv/www/
RUN mkdir /LOGS/

RUN mv /usr/local/etc/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf.back
ADD /conf/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN ln -s /etc/nginx/sites-available/expenses.conf /etc/nginx/sites-enabled/expenses.conf
RUN rm /etc/nginx/sites-enabled/default.conf

CMD ["/start.sh"]
