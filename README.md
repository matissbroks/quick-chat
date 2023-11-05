    
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

### Planned features

- [x] Can create chat rooms
    - Generate unique chat ID
- [x] Can open individual chats
    - [x] Can see all messages
    - [x] Can see all users
    - [x] Can see chat name
- [ ] Can change chat name
- [ ] Can delete chat
    - Deletes all related data
- [ ] Others can change they're nicknames
- [x] Can send messages

---

### Things to have

- [ ] Unit, mby feature testing
- [ ] GitHub action, that run STAN and Code sniffer
