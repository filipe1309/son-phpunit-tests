<?php

use Son\Model\Product;
use PHPUnit\Framework\TestCase as BaseTestCase;

class ProductTest extends BaseTestCase
{
    public function testSetName()
    {
        $product = new Product();
        $product->setName('My product 1');
        $this->assertEquals('My product 1', $product->getName());
    }

    public function testSetPrice()
    {
        $product = new Product();
        $product->setPrice(10.10);
        $this->assertEquals(10.10, $product->getPrice());
        $this->assertInstanceOf(Product::class, $product);
    }
}
