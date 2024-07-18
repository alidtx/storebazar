docker-compose down
docker-compose up -d
docker exec futurebazar composer install
docker exec futurebazar php artisan migrate --force
docker exec futurebazar php artisan optimize:clear