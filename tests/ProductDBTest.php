<?php

use Son\Model\Product;
use PHPUnit\Framework\TestCase as BaseTestCase;

class ProductDBTest extends BaseTestCase
{
    // protected $backupGlobals = false; 

    public function testIfProductIsSaved()
    {
        global $db;
        $product = new Product($db);
        $result = $product->save([
            'name' => 'Product 1',
            'price' => 200.20,
            'quantity' => 10,
        ]);

        $this->assertEquals(1, $product->getId());
        $this->assertEquals('Product 1', $product->getName());
        $this->assertEquals(200.20, $product->getPrice());
        $this->assertEquals(10, $product->getQuantity());
        $this->assertEquals(200.20 * 10, $product->getTotal());
    }

    public function testIfListProducts()
    {
        global $db;
        $product = new Product($db);
        $result = $product->save([
            'name' => 'Product 1',
            'price' => 200.20,
            'quantity' => 10,
        ]);

        $products = $product->all();
        $this->assertCount(2, $products);
    }
}
