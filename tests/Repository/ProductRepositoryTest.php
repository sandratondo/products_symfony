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



    public function testProductRepositoryCanEditProduct(): void
    {
        // Crear y persistir un producto
        $product = new Product();
        $product->setName('Product to Edit');
        $product->setDescription('Original description.');
        $product->setPrice(19.99);
        $product->setStock(15);
        $this->entityManager->persist($product);
        $this->entityManager->flush();

        // Recuperar el producto
        $productFromDb = $this->entityManager
            ->getRepository(Product::class)
            ->findOneBy(['name' => 'Product to Edit']);

        // Asegurarse de que el producto existe
        $this->assertNotNull($productFromDb);

        // Editar el producto
        $productFromDb->setName('Updated Product');
        $productFromDb->setDescription('Updated description.');
        $productFromDb->setPrice(29.99);
        $productFromDb->setStock(25);
        $this->entityManager->flush(); // Guardar los cambios en la base de datos

        // Recuperar el producto editado
        $updatedProduct = $this->entityManager
            ->getRepository(Product::class)
            ->findOneBy(['name' => 'Updated Product']);

        // Verificar que los cambios se reflejan
        $this->assertNotNull($updatedProduct);
        $this->assertSame('Updated Product', $updatedProduct->getName());
        $this->assertSame('Updated description.', $updatedProduct->getDescription());
        $this->assertSame(29.99, $updatedProduct->getPrice());
        $this->assertSame(25, $updatedProduct->getStock());
    }

    public function testProductRepositoryCanDeleteProduct(): void
    {
        // Crear y persistir el producto
        $product = new Product();
        $product->setName('Test Product for Deletion');
        $product->setDescription('This product will be deleted.');
        $product->setPrice(49.99);
        $product->setStock(5);
        $this->entityManager->persist($product);
        $this->entityManager->flush();

        // Eliminar el producto de la base de datos
        $this->entityManager->remove($product);
        $this->entityManager->flush();

        // Intentar recuperar el producto eliminado
        $deletedProduct = $this->entityManager
            ->getRepository(Product::class)
            ->findOneBy(['name' => 'Test Product for Deletion']);

        // Asegurarse de que el producto ya no existe
        $this->assertNull($deletedProduct);
    }

    //limpiar recursos despues de cada prueba
    protected function tearDown(): void
    {
        parent::tearDown();
        $this->entityManager->close();
        $this->entityManager = null; // Evitar problemas de memoria
    }
}
