<?php


use Database\MyPdo;
use Entity\Album;
use Entity\Collection\AlbumCollection;
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

$Artist=new \Entity\Artist();
$Artiste=$Artist->findById($_GET['artistId']);
$nomArtist=$Artiste->getName();





## Ajout du titre

$content=<<<HTML
    <h1>Albums de {$webpage->escapeString($nomArtist)}</h1>
HTML;
$webpage->appendContent($content);

## Ajout du titre de la page

$webpage->setTitle($nomArtist);

## requête pour extraire les albums de cette artiste
$listeAlbum=new AlbumCollection();
$Albums=$listeAlbum->findByArtistId($_GET['artistId']);
## test pour savoir si l'artiste existe bien dans la base de donnée

if (empty($Albums)==true) {
    http_response_code(404);
    exit();
}
## Ajout des album de l'artiste
$albumArray="";
foreach ($Albums as $album){
    $albumArray.=<<<HTML
    <p>{$webpage->escapeString($album->getYear())} {$webpage->escapeString($album->getName())}</p>\n 
HTML;
}

$webpage->appendContent($albumArray);


echo $webpage->toHTML();
