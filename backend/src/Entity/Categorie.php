<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ApiResource(
 *     attributes={
 *          "normalizationContext"={"groups"={"categorie.read", "categorie.list"}},
 *          "denormalizationContext"={"groups"={"categorie.write"}}
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"categorie.read","product.read"})
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Groups({"categorie.read", "product.read"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="categorie")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SubCategorie", mappedBy="categorie")
     * @ApiSubresource()
     */
    private $subCategorie;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->subCategorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setCategorie($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getCategorie() === $this) {
                $product->setCategorie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SubCategorie[]
     */
    public function getSubCategorie(): Collection
    {
        return $this->subCategorie;
    }

    public function addSubCategorie(SubCategorie $subCategorie): self
    {
        if (!$this->subCategorie->contains($subCategorie)) {
            $this->subCategorie[] = $subCategorie;
            $subCategorie->setCategorie($this);
        }

        return $this;
    }

    public function removeSubCategorie(SubCategorie $subCategorie): self
    {
        if ($this->subCategorie->contains($subCategorie)) {
            $this->subCategorie->removeElement($subCategorie);
            // set the owning side to null (unless already changed)
            if ($subCategorie->getCategorie() === $this) {
                $subCategorie->setCategorie(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
