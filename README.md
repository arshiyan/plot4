# Plot Four

##Guideline:
- Use Git : Meaningful commit, git strategy (github flow)
- TDD: Test for check credential 
- Dockerize: Run project anywhere

##Docker 
Add all files in **src** directory and use Docker Compose:
```YAML
version: '3.9'
services:
  php:
    container_name: php-apache
    image: php:8.0-apache
    volumes:
      - ./src:/var/www/html/
    ports:
      - 8000:80

```
OR

Use Docker repository

```Docker
 docker run -d -p80:3000 arshiyan1/plot4
```

##Test

Run Test in docker composer

```Shell
 docker-compose exec php php TestGame.php
```


##Run Game

For Draw plain text change config file:
```php
define("RUNDRAW","noneboxDraw");
```

Run Game in docker composer

```Shell
 docker-compose exec php php index.php
```


