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

    public function getHtmlFrom(string $action): string
    {
        $res=<<<HTML
<form method="POST" action="{$action}">
    <input name="id" type="hidden">
    <label>
        Nom de l'artiste
        <input name="name" type="text" required>
    </label>
    <button type="submit">Enregister</button>
</form>
HTML;
        return $res;
    }
}
