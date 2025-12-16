# Solution RH Recrutement

## Introduction

**Solution RH Recrutement** 

---

## Prerequisites

Before starting, ensure you have the following installed on your system:

- Docker
- Docker Compose
- A terminal or command-line interface

---

## Steps to Run This Project

Follow the steps below to get the project up and running:

### 1. Clone the Repository
```bash
git clone https://github.com/OBouysfi/SolutionRHRecrutement
cd SolutionRHRecrutement
-docker-compose -f docker/docker-compose.yml build
-docker-compose -f docker/docker-compose.yml up -d
-docker-compose -f docker/docker-compose.yml cp app:/var/www/html/vendor ./src
docker exec -it SolutionRHRecrutement-app bash
chown -R nobody:nobody /var/www/html/
composer install
exit

### 2. Access the Project

HJ-Recruitment Application: http://localhost:89
phpMyAdmin: http://localhost:8089


### 3. Contributors
Othman BOUYSFI - Tech Lead ( BYTEIT )
