<?php


use Database\MyPdo;
use Html\WebPage;
$artistId=17;
$webpage=new \Html\WebPage();
$content="";
## requête pour extraire le nom de l'artiste
$stmt = MyPDO::getInstance()->prepare(
    <<<'SQL'
    SELECT name
    FROM artist
    WHERE id=:artistId
SQL);
$stmt->execute([':artistId'=>$artistId]);
$ligne=$stmt->fetch(PDO::FETCH_ASSOC);

## requête

## Ajout du titre
$content=<<<HTML
    <h1>Albums de {$ligne['name']}</h1>
HTML;
$webpage->appendContent($content);
## Ajout du titre de la page
$webpage->setTitle($ligne['name']);

echo $webpage->toHTML();