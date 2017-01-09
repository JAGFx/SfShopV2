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

Chargement des données
````
php app/console doctrine:fixtures:load --append 
````