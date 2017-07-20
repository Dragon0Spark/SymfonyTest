# BonoboProject

Gestion d'une liste d'amis pour bonobos (singes intelligents) en Symfony 3

## Pour commencer

Avoir installer Composer sur sa machine


### Pour démarrer


Configurer votre base de données à l'aide du fichier [parameters.yml](https://github.com/Brayan233/BonoboProject/blob/master/app/config/parameters.yml)

```
# EXEMPLE
parameters:
    database_host: 127.0.0.1
    database_port: null
    database_name: BonoboProject
    database_user: root
    database_password: root
    mailer_transport: smtp
    mailer_host: 127.0.0.1
    mailer_user: null
    mailer_password: null
secret: bf4be6ffc923ed9031f725ce43af2170b6d1467f

```

Créer la BDD que vous avez configuré précédement


Installer/Mettre à jour toutes les dépendances (dont FOSUSERBUNDLE),à l'aide de Composer à la racine du projet

```
composer update
```

Générer les tables pour la BDD

```
php bin/console doctrine:schema:update --force
```

Remplir la BDD avec une liste de Bonobos pré-enregistré

```
php bin/console doctrine:fixtures:load
```

Démarrer le serveur

```
php bin/console server:start
```

ENJOY vous pouvez [démarrer](http://localhost:8000)

