# Développement d'une application Web de consultation et modification de morceaux de musique
## Parent Arthur
## Installation / Configuration
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