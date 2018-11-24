![alt text](https://raw.githubusercontent.com/phomea/Echidna/master/app/backend/assets/img/echidna.png)
# Echidna CMS and Framework
Echidna aim to be an easy and fast framework to develop websites, management softwares and e-commerces.
Echidna is based on applications and entities. Each application holds all the logic, entities, controllers
and templates but can be overrided by the backend or frontend application.

Each application must also declares his own routes ( frontend and backend ).

- Realtime updates on DB based on entities schema
- Ready to use backend
- Automagically creates crud views and routes

Echidna comes with a bunch of applications ( all of theme in beta at the moment) that you can use, extends or customize.
**Feel free to contribute, test, suggest improvements, find bugs etcetc**

# CMS 
Echidna comes with a backend which builds upon the applications you choose to include in your package. 

# Echidna using Docker LAMP
Echidna can run with docker-compose with 4 containers : 
- web -> based on php:7.2-apache with rewrite and headers enabled 
- db -> based on mariadb
- phpmyadmin -> image from corbinu/docker-phpmyadmin
- composer -> container to install and update dependencies

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
