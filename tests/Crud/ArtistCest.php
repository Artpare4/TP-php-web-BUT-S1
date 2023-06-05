<?php

namespace Tests\Crud;

use Entity\Artist;
use Entity\Exception\EntityNotFoundException;
use Tests\CrudTester;

class ArtistCest
{
    public function findById(CrudTester $I)
    {
        $artist = (new \Entity\Artist())->findById(4);
        $I->assertSame(4, $artist->getId());
        $I->assertSame('Slipknot', $artist->getName());
    }

    public function findByIdThrowsExceptionIfArtistDoesNotExist(CrudTester $I)
    {
        $I->expectThrowable(EntityNotFoundException::class, function () {
            Artist::findById(PHP_INT_MAX);
        });
    }
    public function delete(CrudTester $I)
    {
        $artist = Artist::findById(4);
        $artist->delete();
        $I->cantSeeInDatabase('artist', ['id' => 4]);
        $I->cantSeeInDatabase('artist', ['name' => 'Slipknot']);
        $I->assertNull($artist->getId());
        $I->assertSame('Slipknot', $artist->getName());
    }
    public function update(CrudTester $I)
    {
        $artist = Artist::findById(4);
        $artist->setName('Nœud Coulant');
        $artist->save();
        $I->canSeeNumRecords(1, 'artist', [
            'id' => 4,
            'name' => 'Nœud Coulant'
        ]);
        $I->assertSame(4, $artist->getId());
        $I->assertSame('Nœud Coulant', $artist->getName());
    }
}
