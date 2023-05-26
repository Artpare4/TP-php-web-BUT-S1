<?php

namespace Entity;
use Database\MyPdo;
use PDO;

class Cover
{
    private int $id;
    private static $jpeg;

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
    public static function getJpeg()
    {
        return self::$jpeg;
    }

    /**
     * @param int $id
     * @return Cover
     */
    public function findById(int $idCover):Cover{
        $request=MyPdo::getInstance()->prepare(
            <<<SQL
        SELECT id,jpeg
        FROM cover
        WHERE id=:idCover
        SQL);
        $request->execute([':idCover'=>$idCover]);
        $request->setFetchMode(PDO::FETCH_CLASS,Cover::class);
        $res=$request->fetch();
        return $res;
    }
}