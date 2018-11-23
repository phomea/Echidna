
# Echidna using Docker LAMP
Linux + Apache + MariaDB (MySQL) + PHP 5 on Docker Compose. Mod_rewrite enabled by default.

## Instructions

Enter the following command to start your containers:
```bash
$ docker-compose up -d
```

To stop them, use this:
```bash
$ docker-compose stop
```
Use data from docker-compose.yml to access the db :

Db host => db

Username => root

Password => pssrtcdn

Database => echidnadb

# Echidna without docker
Point the root server on app directory, go to app directory on the terminal and install composer.
```bash
$ php composer.phar install
```
Browse to the web root and follow the steps to install your Echidna.

Feel free to contribute with pull requests.

with ❤️ by
Fabio Pocci
