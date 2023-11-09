<?php

namespace Tests;

use BondarDe\Maps\MapDACH;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    public function testSth()
    {
        $mapDach = new MapDACH([
            'de-bw' => 123,
        ]);
        $mapDach->hex('dd0273');

        $html = $mapDach->render();
        $expected = 'Baden-Württemberg: 123';

        self::assertTrue(str_contains($html, $expected));
    }
}
