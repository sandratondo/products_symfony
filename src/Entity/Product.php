<?php 

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La descripción no puede estar vacía.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "El nombre del producto no puede tener más de 255 caracteres."
    )]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "La descripción no puede estar vacía.")]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "El precio es requerido.")]
    #[Assert\Type(
        type: "float",
        message: "El precio debe ser un número válido."
    )]
    #[Assert\Positive(
        message: "El precio debe ser mayor que cero"
    )]
    private ?float $price = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "El stock es requerido.")]
    #[Assert\Type(
        type: "integer",
        message: "El stock tiene que ser un número."
    )]
    #[Assert\PositiveOrZero(message: "El stock no puede ser negativo.")]
    private ?int $stock = null;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;
        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;
        return $this;
    }
}
