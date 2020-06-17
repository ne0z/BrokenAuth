deploy:
	@echo "Deploying docker container"
	@docker-compose up -d --build
	@echo "Please wait..."
	@sleep 10
	@docker-compose exec app php artisan migrate
	@docker-compose exec app php artisan db:seed

destroy:
	@docker-compose down -v
