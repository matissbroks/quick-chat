    
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

### Nex feature to be implemented

- Can create chat rooms

---

### Planned features

- [ ] Can create chat rooms
  - Generate unique chat ID
- [ ] Can change chat name
- [ ] Can delete chat
  - Deletes all related data
- [ ] Others can change they're nicknames
- [ ] Can send messages
  - Can send text messages
