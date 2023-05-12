<?php

namespace Entity\Collection;

use Database\MyPdo;
use PDO;

class ArtistCollection
{
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

