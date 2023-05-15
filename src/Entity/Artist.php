<?php

namespace Entity;

class Artist
{
    private int $id;
    private string $name;

    /**
     * Ascesseur de la classe Artist. Cette méthode retourne l'id de l'artiste
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Ascesseur de la classe Artist. Cette méthode retourne le nom de l'artiste.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
