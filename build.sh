#installing symfony vendor list
docker-compose exec php-fpm composer install 

#updating table schema
docker-compose exec php-fpm bin/console doctrine:schema:update -f

#db update
docker-compose exec -T db mysql -uroot -proot product_db < backup.sql
