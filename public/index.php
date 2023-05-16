<?php

declare(strict_types=1);

use Database\MyPdo;
use Html\WebPage;
use Entity\Artist;
use Entity\Collection\ArtistCollection;
$webPage=new WebPage();

$webPage->setTitle("Liste des artistes");

$Artistes= new ArtistCollection();
$liste_Artistes=$Artistes->findAll();
$content="";

foreach ($liste_Artistes as $artiste) {
    $content .= "<a href='http://localhost:8000/artist.php?artistId={$artiste->getId()}'>{$webPage->escapeString($artiste->getName())}</a><br>";
}
$webPage->appendContent($content);
echo $webPage->toHTML();
