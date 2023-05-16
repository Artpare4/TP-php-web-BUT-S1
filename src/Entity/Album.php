<?php

namespace Entity;

class Album
{
    private int $id;
    private string $name;
    private int $year;
    private int $artistId;
    private int $genreld;
    private int $coverId;

    /**
     * Méthode de la classe Album. Cette méthode retourne un entier correspondant à l'ID de l'album.
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Méthode de la classe Album. Cette méthode retourne un string correspondant au nom de l'album.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Méthode de la classe Album. Cette méthode retourne un entier correspondant à l'année de l'album.
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * Méthode de la classe Album. Cette méthode retourne un entier correspondant à l'ID de l'artiste qui à composé l'album.
     * @return int
     */
    public function getArtistId(): int
    {
        return $this->artistId;
    }

    /**
     * Méthode de la classe Album. Cette méthode retourne un entier correspondant à l'ID du genre de l'album.
     * @return int
     */
    public function getGenreld(): int
    {
        return $this->genreld;
    }

    /**
     * Méthode de la classe Album. Cette méthode retourne un entier correspondant à l'ID de la cover de l'album.
     * @return int
     */
    public function getCoverId(): int
    {
        return $this->coverId;
    }
}
