<?php

use Son\Area;
use PHPUnit\Framework\TestCase as BaseTestCase;

class MyFirstTest extends BaseTestCase
{
    public function testArray()
    {
        $array = [2];
        $this->assertNotEmpty($array);
    }

    public function testArea()
    {
        $area = new Area();
        $this->assertEquals(6, $area->getArea(2, 3));
    }
}
