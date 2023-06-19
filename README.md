# Développement d'une application Web de consultation et modification de morceaux de musique
## Parent Arthur
Ce dépôt contients touts le fichiers issue des TP de qualité de développement et de DEV IHM réalisé au cours du deuxième semestre ma première année de but informatique.
Ce TP consite en la création d'un site web de lecteur d'une base de donnée. Le but étant de pourvoir lister les groupes de musique de la base de donnée et de pouvoir voir leurs albums.
L'autre but de ce tp était de nous introduires au bon principes de développement:
- utilisation de namespace
- utilisation de la POO (programmation orienté objet)
- protection des informations lors déchanges avec la base de donnée
Et de pourvoir manipuler certains module :
- codeception (pour les différents tests)
- composer 
- cs-fixer
## Installation / Configuration
### Configuration de la base de donnée
Les informations du fichier .mydpo.ini est utilisé lors de la connection à la base de donnée et permet de se connecter lors de l'utilisation de MyPDO::getInstance
### Serveur web local:
1. Placez-vous dans la racine de votre projet

2. Exécuter cette commande pour lancer le serveur web 
    ```php -d display_errors -S localhost:8000 -t public/```

### Style de codage
1. 
```
php vendor/bin/php-cs-fixer fix --dry-run
```
Cette commande permet d'exécuter php-cs-fixer sans modifier de fichier
2.
```
php vendor/bin/php-cs-fixer fix --dry-run --diff
```
Cette commande permet d'éxécuter pgp-cs-fixer en affichiant les différences entre
le fichier original et après sa correction sans pour autant le modifier
3. 
```
php vendor/bin/php-cs-fixer fix
```
Cette commande permet de corriger les fichiers grâce à php-cs-fixer
4.
```
composer "start:linux"
```
Cette commande permet de lancer un serveur Web local grâce à composer
5. 
```
composer "text:cs"
```
Cette commande permet de lancer une vérification du code en utilisant cs-fixer
6. 
```
composer "fix:cs"
```
Cette commande permet de lancer une correction du code en utilisant cs-fixer

7.
```
composer  test:crud
```
Cette commande permet de d'exécuter les test sur crud

8. 
```
composer test:codecept
```
Cette commande permet d'exécuter les tests de codeception
9. 
```
composer test
```
Cette commende permet de lancer les tests de codeception et de cs-fixer

10.
```
composer start:test:windows
```
Cette commande permet de lancer le serveur web local de test sous windows

11.
```
composer start:test:linux
```
Cette commande permet de lancer le serveur web local de test sous linux

12.
```
composer test;browse
```
Cette commande efface tous les fichiers d'échec "Cest" d'acceptation et lance les test Browse 
