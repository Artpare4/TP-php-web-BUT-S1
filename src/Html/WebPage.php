<?php

declare(strict_types=1);

namespace Html;

class WebPage
{
    private string $head;
    private string $title;
    private string $body;

    /**
     * @param string $title
     */
    public function __construct(string $title = "")
    {
        $this->title = $title;
        $this->head = "";
        $this->body = "";
    }

    /**
     * @return string
     */
    public function getHead(): string
    {
        return $this->head;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $content
     * @return void
     */
    public function appendToHead(string $content): void
    {
        $this->head .= $content;
    }

    /**
     * @param string $css
     * @return void
     */
    public function appendCss(string $css): void
    {
        $res = "<style>";
        $res .= $css;
        $res .= "</style>";
        $this->appendToHead($res);
    }

    /**
     * @param string $css
     * @return void
     */
    public function appendCssUrl(string $url): void
    {
        $res = "<link rel=\"stylesheet\" href=\"";
        $res .= $url;
        $res .= "\">";
        $this->appendToHead($res);
    }

    /**
     * @param string $js
     * @return void
     */
    public function appendJs(string $js): void
    {
        $res = "<script>";
        $res .= $js;
        $res .= "</script>";
        $this->appendToHead($res);
    }

    /**
     * @param string $url
     * @return void
     */
    public function appendJsUrl(string $url)
    {
        $res = "<script src=\"";
        $res .= $url;
        $res .= "\"></script>";
        $this->appendToHead($res);
    }

    /**
     * @param string $content
     * @return void
     */
    public function appendContent(string $content): void
    {
        $this->body .= $content;
    }

    /**
     * @return string
     */
    public function toHTML(): string
    {
        $res = <<<HTML
    <!DOCTYPE html>
    <html lang="fr">
    <head>
         <meta charset="UTF-8">
         <title> $this->title</title>
         <meta name="viewport">
         $this->head
         
    </head>
    <body>
        $this->body
    </body>
</html>
HTML;

        return $res;
    }

    /**
     * @return string
     */
    public function getLastModification(): string
    {
        return date('j F o', getlastmod());
    }

    /**
     * @param string $string
     * @return string
     */
    public function escapeString(string $string): string
    {
        return htmlspecialchars($string, ENT_HTML5 | ENT_QUOTES);
    }
}
