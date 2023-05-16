<?php

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Album;
use PDO;

class AlbumCollection
{
    /**
     * @param int $artistId
     * @return Album[]
     */
    public function findByArtistId(int $artistId):array{
        $request=MyPdo::getInstance()->prepare(
            <<<SQL
            SELECT al.name,al.year,ar.name
            FROM artist ar,
                album al
            WHERE al.artistId=ar.artistId
            AND al.artisitID:artistId
            ORDER BY al.year DESC,al.name;
        SQL);
        $request->execute([':artistId'=>$artistId]);
        $res=$request->fetchAll(PDO::FETCH_CLASS, Album::class);
        return $res;
    }
}