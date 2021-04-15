<?php

use Son\Model\Product;
use PHPUnit\Framework\TestCase as BaseTestCase;

class ProductTest extends BaseTestCase
{
    private $product;

    public function setUp(): void
    {
        $pdo = $this->getMockBuilder(\PDO::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->product = new Product($pdo);
    }

    public function testIfIdIsNull()
    {
        $this->assertNull($this->product->getId());
    }

    public function testIfTotalIsNull()
    {
        $this->assertNull($this->product->getTotal());
    }

    /**
     * @dataProvider collectionData
     */
    public function testEncapsulate($property, $expected)
    {
        $genericGet = $this->product->{'get' . ucfirst($property)}();
        $this->assertNull($genericGet);

        $genericSet = $this->product->{'set' . ucfirst($property)}($expected);
        $this->assertInstanceOf(Product::class, $genericSet);

        $genericGet = $this->product->{'get' . ucfirst($property)}();
        $this->assertEquals($expected, $genericGet);
    }

    public function collectionData()
    {
        return [
            ['name', 'Product 1', 'Product 1'],
            ['price', 10.11, 10.11],
            ['quantity', 5, 5],
        ];
    }
}
