<?php

namespace Entity;

use Database\MyPdo;
use Entity\Collection\AlbumCollection;
use Entity\Exception\EntityNotFoundException;
use PDO;

class Artist
{
    private ?int $id;
    private string $name;

    /**
     * Ascesseur de la classe Artist. Cette méthode retourne l'id de l'artiste
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Artist
     */
    public function setId(?int $id): Artist
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Ascesseur de la classe Artist. Cette méthode retourne le nom de l'artiste.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name Le nom
     * @return Artist
     */
    public function setName(string $name): Artist
    {
        $this->name = $name;
        return $this;
    }



    /**
     * Méthode de la classe Artist. Cette méthode retourne un Artiste ayant l'id passé en paramètre.
     * @param int $id
     * @return Artist
     */
    public static function findById(int $id):Artist{
        $request=MyPdo::getInstance()->prepare(
            <<<SQL
            SELECT id,name
            FROM artist
            WHERE id=:artistId
            SQL);
        $request->execute([':artistId'=>$id]);
        $request->setFetchMode(PDO::FETCH_CLASS,Artist::class);
        $res=$request->fetch();
        if ($res==false){
            throw new EntityNotFoundException('L\'id n\'a pas d`\'artiste associé');
        }
        return $res;
    }

    /**
     * Méthode de la classe Artist. Cette méthode retourne les albums de l'artiste.
     * @return Album[]
     */
    public function getAlbums():array{
        $res= (new Collection\AlbumCollection)->findByArtistId($this->getId());
        return $res;
    }
}
