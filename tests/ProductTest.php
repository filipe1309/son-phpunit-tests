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

    public function testSetAndGetName()
    {
        $product = new Product();
        $this->assertNull($product->getName());
        $this->assertInstanceOf(Product::class, $product->setName('My product 1'));
        $this->assertEquals('My product 1', $product->getName());
    }

    public function testSetAndGetPrice()
    {
        $product = new Product();
        $this->assertNull($product->getPrice());
        $this->assertInstanceOf(Product::class, $product->setPrice(10.10));
        $this->assertEquals(10.10, $product->getPrice());
        $this->assertInstanceOf(Product::class, $product);
    }

    public function testSetAndGetQuantity()
    {
        $product = new Product();
        $this->assertNull($product->getQuantity());
        $this->assertInstanceOf(Product::class, $product->setQuantity(5));
        $this->assertEquals(5, $product->getQuantity());
        $this->assertInstanceOf(Product::class, $product);
    }

    public function testIfTotalIsNull()
    {
        $product = new Product();
        $this->assertNull($product->getTotal());
    }
}
