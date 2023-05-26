<?php

declare(strict_types=1);

use Html\AppWebPage;
use Entity\Collection\ArtistCollection;

$webPage=new AppWebPage("Liste des Artistes");

$webPage->setTitle("Liste des Artistes");

$Artistes= new ArtistCollection();
$liste_Artistes=$Artistes->findAll();

$content="";

foreach ($liste_Artistes as $artiste) {
    $content .= "<a class='artist' href='http://localhost:8000/artist.php?artistId={$artiste->getId()}' >{$webPage->escapeString($artiste->getName())}</a>";
}

$webPage->appendContent($content);
echo $webPage->toHTML();
