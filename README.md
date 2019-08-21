# CIA Games portal for FBI QR remote installer

Without Database. Only on files. 

![Screenshot](https://i.imgur.com/C3M45cd.jpg)

### Requirements:
1) Docker
2) docker-compose
3) make (optional)


### Instalation:

1) Build images
```bash
make build
```

2) Up containers:
```bash
make up
```

3) Go to php container:
```bash
make bash
```

4) Install dependencies:
```bash
cd /var/www
composer install
```

### Usage

* Open http://localhost/
* Add new game: http://localhost/add
-----
* Max. file size ~ 2G
* Execution time ~ 600s