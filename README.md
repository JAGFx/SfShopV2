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

## Projet

### Comptes utilisateurs disponibles
#### Client standard

* Nom d'utilisateur: `smithe`
* Mot de passe: `pswd`

#### Administrateur

* Nom d'utilisateur: `esmith`
* Mot de passe: `pswd`

### Bundles utilisés

* Assetics ( Gestions des resosurces web )
* FOSUser ( Gestion utilisateurs )
* VichUploader ( Gestion d'images )
* DoctirneFixtures ( Préchargement des données )

### Fonctionalités attendus

* `Général` Liste des articles et des catégories
* `Général` Filtrage d'articles par catégorie
* `Général` Constitution d'un panier (Ajout et validation)
* `Général` Passer commander
* `Général` Back-office avec tâches communes sur les entités (Ajout, modification et suppression)
* `Général` Gestion de compte utilisateur
* `Symfony` Utilisation de Doctrine ORM
* `Symfony`  Mise en place d'un fournisseur d'utilisateur
* `Symfony` Mise en place de la Sécurité

### Fonctionnalités supplémentaires

* `Général` Liste de marques
* `Général` Filtrage des articles par marque
* `Général` Ajout de promotion sur les acrticles
* `Symfony` Validation des formulaires
* `Symfony` Traduction en Français et en Anglais
* `Symfony` Séparation du backoffice dans un bundle dédié

