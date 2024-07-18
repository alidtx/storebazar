FROM webdevops/php-nginx:8.0
WORKDIR /app

# Service configuration
# RUN docker-cronjob '* * * * * root /usr/local/bin/php /app/artisan schedule:run >> /app/storage/logs/cron.log 2>&1'
# RUN docker-service enable cron

# COPY ./docker-compose/application/supervisor/laravel-worker.conf /opt/docker/etc/supervisor.d/
# RUN docker-service enable laravel-worker
