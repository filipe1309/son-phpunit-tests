<?php

namespace Son\Model;

class Product
{
    private $id;
    private $name;
    private $price;
    private $quantity;
    private $total;


    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Product
     */
    public function setName($name): Product
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Product
     */
    public function setPrice($price): Product
    {
        $this->price = $price;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     * @return Product
     */
    public function setQuantity($quantity): Product
    {
        $this->quantity = $quantity;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     * @return Product
     */
    public function setTotal($total): Product
    {
        $this->total = $total;
        return $this;
    }
}
