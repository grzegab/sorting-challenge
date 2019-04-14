<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\FakeData;

class FakeDataTest extends TestCase
{
    public function testGenerateData()
    {
        $fakeData = new FakeData();
        $arrayData = $fakeData->generateData();
        $this->assertNotEmpty($arrayData[0]);
        $this->assertCount(20, $arrayData);
        $this->assertCount(10, $fakeData->generateData(10));
    }
}
