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
            SELECT al.id,al.name,al.year,al.artistID,al.genreId,al.coverId
            FROM artist ar,
                album al
            WHERE al.artistId=ar.id
            AND al.artistID=:artistId
            ORDER BY al.year DESC,al.name;
        SQL);
        $request->execute([':artistId'=>$artistId]);
        $res=$request->fetchAll(PDO::FETCH_CLASS, Album::class);
        return $res;
    }
}