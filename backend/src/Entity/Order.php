<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @ORM\Column(type="text")
     */
    private $shipping_method;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $order_weight;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $shipping_fee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getShippingMethod(): ?string
    {
        return $this->shipping_method;
    }

    public function setShippingMethod(string $shipping_method): self
    {
        $this->shipping_method = $shipping_method;

        return $this;
    }

    public function getOrderWeight(): ?string
    {
        return $this->order_weight;
    }

    public function setOrderWeight(string $order_weight): self
    {
        $this->order_weight = $order_weight;

        return $this;
    }

    public function getShippingFee(): ?string
    {
        return $this->shipping_fee;
    }

    public function setShippingFee(string $shipping_fee): self
    {
        $this->shipping_fee = $shipping_fee;

        return $this;
    }
}
