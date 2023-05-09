<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';
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
    $content.= "<p>{$webPage->escapeString($ligne['name'])}</p>\n";
}
$webPage->appendContent($content);
echo $webPage->toHTML();
