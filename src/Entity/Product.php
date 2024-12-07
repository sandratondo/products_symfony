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
    /**
     * @Assert\NotBlank(message="The product name cannot be empty.")
     * @Assert\Length(
     *     max=255,
     *     maxMessage="The product name cannot be longer than 255 characters."
     * )
     */
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    /**
     * @Assert\NotBlank(message="The description cannot be empty.")
     */
    private ?string $description = null;

    #[ORM\Column]
    /**
     * @Assert\NotBlank(message="The price is required.")
     * @Assert\Type(
     *     type="float",
     *     message="The price must be a valid number."
     * )
     * @Assert\Positive(
     *     message="The price must be greater than zero."
     * )
     */
    private ?float $price = null;

    #[ORM\Column]
    /**
     * @Assert\NotBlank(message="The stock is required.")
     * @Assert\Type(
     *     type="integer",
     *     message="The stock must be a whole number."
     * )
     * @Assert\PositiveOrZero(
     *     message="The stock cannot be negative."
     * )
     */
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
