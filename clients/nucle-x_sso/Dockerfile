FROM nucle-x_php

WORKDIR /app

ADD ./clients/nucle-x_sso .

RUN composer install

# FROM nucle-x_sso

CMD php artisan serve --host=0.0.0.0:8000
EXPOSE 8000

# RUN php artisan migrate:fresh --seed
