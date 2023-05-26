<?php

namespace Html;
class AppWebPage extends WebPage
{
    public function __construct(string $title = "")
    {
        parent::__construct($title);
    }
    public function toHTML(): string
    {
        $dernièreModif = Webpage::getLastModification();
        $head=$this->getHead();
        $title=$this->getTitle();
        $body=$this->getBody();
        return <<<HTML
        <!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                $head
                <title>$title</title>
                <link href="css/style.css" rel="stylesheet">
            </head>
            <body>
                <header class="header">
                    <h1>$title</h1>
                </header>
                <div class="content">
                    $body
                </div>
                <footer class="footer">
                    <div><p class="lastModif">Dernière modification : $dernièreModif</p></div>
                </footer>
            </body>
        </html>
        HTML;
    }
}