<?php

namespace Html\Form;

use Entity\Artist;
use Html\StringEscaper;

class ArtistForm
{
    use StringEscaper;
    private ?Artist $artist;

    /**
     * @param Artist|null $artist
     */
    public function __construct(?Artist $artist=null)
    {
        $this->artist = $artist;
    }

    /**
     * @return Artist|null
     */
    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function getHtmlForm(string $action): string
    {

        $res=<<<HTML
<form method="post" action="{$action}">
    <input name="id" type="hidden" value="{$this->artist?->getId()}">
    <label>
        Nom de l'artiste
        <input name="name" type="text" value="{$this->escapeString($this->artist?->getName())}" required>
    </label>
    <button type="submit">Enregister</button>
</form>
HTML;
        return $res;
    }
}
