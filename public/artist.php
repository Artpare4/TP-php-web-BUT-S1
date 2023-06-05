<?php

use Entity\Collection\AlbumCollection;
use Entity\Cover;
use Html\AppWebPage;

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

$webpage=new AppWebPage();
$content="";

## requête pour extraire le nom de l'artiste

$Artist=new \Entity\Artist();
try {
    $Artiste = $Artist->findById($_GET['artistId']);
} catch  (Exception) {
    http_response_code(404);
    exit();
}

$nomArtist=$Artiste->getName();

## Ajout du titre de la page

$webpage->setTitle("Albums de {$nomArtist}");

## requête pour extraire les albums de cette artiste
$listeAlbum=new AlbumCollection();
$Albums=$listeAlbum->findByArtistId($_GET['artistId']);
## test pour savoir si l'artiste existe bien dans la base de donnée

## Ajout des album de l'artiste et de leurs cover

$albumArray="";
foreach ($Albums as $album) {
    $albumArray.=<<<HTML
    <div class="album"><img class="album__cover" alt="" src="/cover.php?coverId={$album->getCoverId()}" ><div class="album__info"><p class="album__year">{$webpage->escapeString($album->getYear())}</p><p class="album__name">{$webpage->escapeString($album->getName())}</p></div></div>\n 
HTML;
}

$webpage->appendContent($albumArray);


echo $webpage->toHTML();
