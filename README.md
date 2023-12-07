    
# Quick chat

---

Laravel based web application for quick chat.

---

## Installation

1. Clone the repository
2. Go into project folder
3. Start docekr containers `docker-compose up -d`
4. Install composer dependencies `docker-compose exec app composer install`
5. Create .env file `docker-compose exec app cp .env.example .env`
6. Generate application key `docker-compose exec app php artisan key:generate`
7. Run migrations `docker-compose exec app php artisan migrate`
8. Run seeds `docker-compose exec app php artisan db:seed`

---

### Things to have

- To rebuild PHP image and run all services, run this `docker-compose up --build -d`
- Need to run this too `docker-compose exec app npm install`
- Rebuilding assets, cuz yeah`docker-compose exec app npm run build`

- [ ] UI improvements using CSS, JS
