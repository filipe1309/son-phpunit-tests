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

        return $result->getId();
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

    /**
     * @depends testIfProductIsSaved
     */
    public function testIfProductIsUpdated($id)
    {
        global $db;
        $product = new Product($db);
        $result = $product->save([
            'id' => $id,
            'name' => 'Product 1.1',
            'price' => 300.20,
            'quantity' => 20,
        ]);

        $this->assertEquals($id, $product->getId());
        $this->assertEquals('Product 1.1', $product->getName());
        $this->assertEquals(300.20, $product->getPrice());
        $this->assertEquals(20, $product->getQuantity());
        $this->assertEquals(300.20 * 20, $product->getTotal());

        return $id;
    }

    /**
     * @depends testIfProductIsUpdated
     */
    public function testIfProductCanBeRecovered($id)
    {
        global $db;
        $product = new Product($db);
        $result = $product->find($id);

        $this->assertEquals($id, $result->getId());
        $this->assertEquals('Product 1.1', $result->getName());
        $this->assertEquals(300.20, $result->getPrice());
        $this->assertEquals(20, $result->getQuantity());
        $this->assertEquals(300.20 * 20, $result->getTotal());
    }

    public function testIfProductNotFound()
    {
        global $db;
        $id = 99999;
        $product = new Product($db);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Produto não existente.');
        $product->find($id);
    }

    /**
     * @depends testIfProductIsUpdated
     */
    public function testIfProductCanBeDeleted($id)
    {
        global $db;
        $product = new Product($db);
        $result = $product->delete($id);

        $this->assertTrue($result);
        $products = $product->all();
        $this->assertCount(1, $products);
    }
}
