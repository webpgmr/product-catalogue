<?php
// api/src/Entity/Product.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * A Product.
 *
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @ApiResource
 */
class Product
{
    /**
     * @var int The id of this product.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The title of this Product.
     *
     * @ORM\Column(type="text")
     */
    public $title;

    /**
     * @var string The brand of this product.
     *
     * @ORM\Column(type="text")
     */
    public $brand;

    /**
     * @var float The price of this product.
     *
     * @ORM\Column(type="float")
     */
    public $price;


    public function getId(): ?int
    {
        return $this->id;
    }
}
