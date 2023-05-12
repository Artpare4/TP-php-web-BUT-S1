<?php

declare(strict_types=1);

use Database\MyPdo;
use Html\WebPage;

$webPage=new WebPage();

$webPage->setTitle("Liste des artistes");


$stmt = MyPDO::getInstance()->prepare(
    <<<'SQL'
    SELECT id, name
    FROM artist
    ORDER BY name
SQL
);

$stmt->execute();
$content="";

while (($ligne = $stmt->fetch()) !== false) {
    $content.= "<a href='http://localhost:8000/artist.php?artistId={$ligne['id']}'>{$webPage->escapeString($ligne['name'])}</a><br>";
}
$webPage->appendContent($content);
echo $webPage->toHTML();
