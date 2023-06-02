<?php

namespace Entity;
use Database\MyPdo;
use Entity\Exception\EntityNotFoundException;
use PDO;

class Cover
{
    private int $id;
    private string $jpeg;

    /**
     * Méthode de la classe cover. Retourne l'id de la cover.
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Méthode de la classe cover. Retourne la location du fichier jpeg de la Cover
     * @return mixed
     */
    public function getJpeg()
    {
        return $this->jpeg;
    }

    /**
     * Méthode de la classe cover. Ce méthode retourne la cover associé à l'id passé en paramètre
     * @param int $id
     * @return Cover
     */
    public static function findById(int $idCover):Cover{
        $request=MyPdo::getInstance()->prepare(
            <<<SQL
        SELECT id,jpeg
        FROM cover
        WHERE id=:idCover
        SQL);
        $request->execute([':idCover'=>$idCover]);
        $request->setFetchMode(PDO::FETCH_CLASS,Cover::class);
        $res=$request->fetch();
        if ($res==false){
            throw new EntityNotFoundException('L\'id n\'a pas de cover associé');
        }
        return $res;
    }
}