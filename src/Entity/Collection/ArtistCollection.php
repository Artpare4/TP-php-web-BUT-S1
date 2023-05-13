<?php

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Artist;
use PDO;

class ArtistCollection
{
    /**
     * Méthode de la classe ArtistCollection. Cette méthode retourne une liste contenant touts les artistes de la base de donées.
     * @return Artist[]
     */
    public function findAll():array{
        $res=[];
        $request=MyPdo::getInstance()->prepare(<<<SQL
            SELECT id,name
            FROM artist;
        SQL);
        $request->execute();
        $res=$request->fetchAll(PDO::FETCH_CLASS);
        sort($res);
        return $res;
    }
}

