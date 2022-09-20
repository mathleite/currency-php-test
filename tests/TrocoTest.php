<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Troco;

class TrocoTest extends TestCase
{
    /** @dataProvider provideCurrencyStructureAndItsCorrespondingAmount */
    public function testQtdeNotasRetornaOArray(array $currencyStructure, float $amount)
    {
        $this->assertEquals($currencyStructure, (new Troco())->getQtdeNotas($amount));
    }

    public function provideCurrencyStructureAndItsCorrespondingAmount(): \Iterator
    {
        yield '100.00' => [[
            "100" => 1,
            "50" => 0,
            "20" => 0,
            "10" => 0,
            "5" => 0,
            "2" => 0,
            "1" => 0,
            "0.5" => 0,
            "0.25" => 0,
            "0.1" => 0,
            "0.05" => 0,
            "0.01" => 0,
        ], 100.00];
        yield '135.00' => [[
            "100" => 1,
            "50" => 0,
            "20" => 1,
            "10" => 1,
            "5" => 1,
            "2" => 0,
            "1" => 0,
            "0.5" => 0,
            "0.25" => 0,
            "0.1" => 0,
            "0.05" => 0,
            "0.01" => 0,
        ], 135.00];
        yield '50.10' => [[
            "100" => 0,
            "50" => 1,
            "20" => 0,
            "10" => 0,
            "5" => 0,
            "2" => 0,
            "1" => 0,
            "0.5" => 0,
            "0.25" => 0,
            "0.1" => 1,
            "0.05" => 0,
            "0.01" => 0,
        ], 50.10];
        yield '0.10' => [[
            "100" => 0,
            "50" => 0,
            "20" => 0,
            "10" => 0,
            "5" => 0,
            "2" => 0,
            "1" => 0,
            "0.5" => 0,
            "0.25" => 0,
            "0.1" => 1,
            "0.05" => 0,
            "0.01" => 0,
        ], 0.10];
        yield '809.35' => [[
            "100" => 8,
            "50" => 0,
            "20" => 0,
            "10" => 0,
            "5" => 1,
            "2" => 2,
            "1" => 0,
            "0.5" => 0,
            "0.25" => 1,
            "0.1" => 1,
            "0.05" => 0,
            "0.01" => 0,
        ], 809.35];
    }
}