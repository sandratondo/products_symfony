<?php

namespace App\Tests\Repository;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductRepositoryTest extends KernelTestCase
{
    private $entityManager; //para interactuar con la base de datos y hacer operaciones como guardar

    protected function setUp(): void
    {
        $kernel = self::bootKernel(); // Inicia el kernel de Symfony
        $this->entityManager = $kernel->getContainer() //se van obteniendo los servicios con get
            ->get('doctrine')
            ->getManager();
    }

    public function testProductRepositoryCanSaveAndRetrieveProduct(): void
    {
        // Crear un nuevo producto
        $product = new Product();
        $product->setName('Test Product');
        $product->setDescription('This is a test product.');
        $product->setPrice(99.99);
        $product->setStock(10);

        // Guardar en la base de datos
        $this->entityManager->persist($product);
        $this->entityManager->flush();

        // Recuperar el producto
        $productFromDb = $this->entityManager
            ->getRepository(Product::class)
            ->findOneBy(['name' => 'Test Product']);

        //se comparan valores
        $this->assertNotNull($productFromDb);
        $this->assertSame('Test Product', $productFromDb->getName());
        $this->assertSame('This is a test product.', $productFromDb->getDescription());
        $this->assertSame(99.99, $productFromDb->getPrice());
        $this->assertSame(10, $productFromDb->getStock());
    }

    //limpiar recursos despues de cada prueba
    protected function tearDown(): void
    {
        parent::tearDown();
        $this->entityManager->close();
        $this->entityManager = null; // Evitar problemas de memoria
    }
}
