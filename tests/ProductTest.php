<?php

use Son\Model\Product;
use PHPUnit\Framework\TestCase as BaseTestCase;

class ProductTest extends BaseTestCase
{
    public function testIfIdIsNull()
    {
        $product = new Product();
        $this->assertNull($product->getId());
    }

    public function testIfTotalIsNull()
    {
        $product = new Product();
        $this->assertNull($product->getTotal());
    }

    /**
     * @dataProvider collectionData
     */
    public function testEncapsulate($property, $expected)
    {
        $product = new Product();

        $genericGet = $product->{'get' . ucfirst($property)}();
        $this->assertNull($genericGet);

        $genericSet = $product->{'set' . ucfirst($property)}($expected);
        $this->assertInstanceOf(Product::class, $genericSet);

        $genericGet = $product->{'get' . ucfirst($property)}();
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
