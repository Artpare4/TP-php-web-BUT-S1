<?php


use Database\MyPdo;
use Html\WebPage;

## contrôle sur le  artist ID
if (isset($_GET['artistId'])==true||empty($_GET['artistId'])==false) {
    if(ctype_digit($_GET['artistId'])==false) {
        header("HTTP/1.1 302 Found");
        header("Location: /index.php");
        exit();
    } else {
        $artistId=$_GET['artistId'];
    }
} else {
    header("HTTP/1.1 302 Found");
    header("Location: /index.php");
    exit();
}

$webpage=new \Html\WebPage();
$content="";

## requête pour extraire le nom de l'artiste

$stmt = MyPDO::getInstance()->prepare(
    <<<'SQL'
    SELECT name
    FROM artist
    WHERE id=:artistId
SQL
);
$stmt->execute([':artistId'=>$artistId]);
$ligne=$stmt->fetch(PDO::FETCH_ASSOC);
## test pour savoir si l'artiste existe bien dans la base de donnée
if (empty($ligne)==true) {
    http_response_code(404);
    exit();
}
## Ajout du titre
$content=<<<HTML
    <h1>Albums de {$webpage->escapeString($ligne['name'])}</h1>
HTML;
$webpage->appendContent($content);

## Ajout du titre de la page
$webpage->setTitle($ligne['name']);

## requête pour extraire les albums de cette artiste
$stmt2=MyPdo::getInstance()->prepare(
    <<<SQL
    SELECT a.name,
           a.year
    FROM album a,
        artist ar
    WHERE a.artistId=ar.id
    AND a.artistId=:artistId
    ORDER BY a.year DESC,a.name ;
SQL
);
$stmt2->execute([':artistId'=>$artistId]);
$albumArray="";

## Ajout des album de l'artiste
while(($album= $stmt2->fetch(PDO::FETCH_ASSOC)) !== false) {
    $albumArray.=<<<HTML
    <p>{$webpage->escapeString($album['year'])} {$webpage->escapeString($album['name'])}</p>\n 
HTML;
}
$webpage->appendContent($albumArray);

echo $webpage->toHTML();
