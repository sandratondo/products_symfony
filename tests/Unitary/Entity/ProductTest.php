<?php
// tests/Entity/ProductTest.php
namespace App\Tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    //metodo que prueba la funcionalidad nombre
    public function testProductName()
    {
        $product = new Product();
        $product->setName('prueba producto');

        //  Verifica que el primer valor sea igual al segundo valor 
        $this->assertEquals('prueba producto', $product->getName());
    }


    //metodo que prueba la funcionalidad description
    public function testProductDescription()
    {
        $product = new Product();
        $product->setDescription('descripcion prueba');

        //  Verifica que el primer valor sea igual al segundo valor 
        $this->assertEquals('descripcion prueba', $product->getDescription());
    }

    //metodo que prueba la funcionalidad precio
    public function testProductPrice()
    {
        $product = new Product();
        $product->setPrice(100.0);

        //  Verifica que el primer valor sea igual al segundo valor 
        $this->assertEquals(100.0, $product->getPrice());
    }

    //metodo que prueba la funcionalidad stock
    public function testProductStock()
    {
        $product = new Product();
        $product->setStock(10);

        //  Verifica que el primer valor sea igual al segundo valor 
        $this->assertEquals(10, $product->getStock());
    }
}
