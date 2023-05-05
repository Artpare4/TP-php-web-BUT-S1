<?php
declare(strict_types=1);

require_once '../vendor/autoload.php';
use Database\MyPdo;
$html=<<<HTML
    <!DOCTYPE html>
    <html>
    
        <head>
            <title>Liste des artistes</title>
        </head>
        <body> \n
HTML;

MyPDO::setConfiguration('mysql:host=mysql;dbname=cutron01_music;charset=utf8', 'web', 'web');

$stmt = MyPDO::getInstance()->prepare(
    <<<'SQL'
    SELECT id, name
    FROM artist
    ORDER BY name
SQL
);

$stmt->execute();

while (($ligne = $stmt->fetch()) !== false) {
    $html.= "<p>{$ligne['name']}</p>\n";
}

$html.=<<<HTML
    </body>
</html>
HTML;

echo $html;
