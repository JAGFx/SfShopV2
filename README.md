A Symfony project created on November 28, 2016, 9:56 am.
# SfShopV2

## Installation

Intaller les dépendences
````
composer self-update
composer update
````

Création de la base de données
````
php app/console doctrine:database:create
````

Création du schéma de la base de données
````
php app/console doctrine:schema:update --force
````

Chargements des images dans /web (A executer avant tout chargement des données)
````
php app/console assets:install
````

Chargement des données
````
php app/console doctrine:fixtures:load --append 
````

Copie des fichers de style (CSS, JS, Images, etc...)
````
php app/console assetic:dump --force
````