<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      attributes={
 *          "normalization_context"={"groups"={"product.read"}},
 *          "denormalization_context"={"groups"={"product.write"}}
 *     },
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $listingPicture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\characteristic", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $characteristic;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Order", mappedBy="product")
     */
    private $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getListing�Picture(): ?string
    {
        return $this->listingPicture;
    }

    public function setListing�Picture(?string $listingPicture): self
    {
        $this->listingPicture = $listingPicture;

        return $this;
    }

    public function getCharacteristic(): ?characteristic
    {
        return $this->characteristic;
    }

    public function setCharacteristic(?characteristic $characteristic): self
    {
        $this->characteristic = $characteristic;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->addProduct($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
            $order->removeProduct($this);
        }

        return $this;
    }
}
