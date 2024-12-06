<?php
// src/Controller/ProductController.php
namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    //Logica para crear productos
    #[Route('/product/create', name: 'app_product_create')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        // Crear un nuevo producto vacío
        $product = new Product();

        // Crear el formulario
        $form = $this->createForm(ProductType::class, $product);

        // Manejar la solicitud (si es un POST, procesar el formulario)
        $form->handleRequest($request);

        // Si el formulario es válido, guardar el producto
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($product);
            $em->flush(); //Guarda el producto bd si el formulario es válido

            // Redirigir a la lista de productos (en este caso lo redirigimos a la misma página)
            return $this->redirectToRoute('app_product_list');
        }

        // Renderizar la plantilla con el formulario
        return $this->render('product/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //se listan productos en este metodo
    #[Route('/product', name: 'app_product_list')]
    public function list(EntityManagerInterface $em): Response
    {
        // Obtener todos los productos de la base de datos
        $products = $em->getRepository(Product::class)->findAll();

        // Renderizar la vista de productos
        return $this->render('product/list.html.twig', [
            'products' => $products,
        ]);
    }

        // Ruta y método para editar un producto
        #[Route('/product/edit/{id}', name: 'app_product_edit')]
        public function edit($id, Request $request, EntityManagerInterface $em): Response
        {
            // Buscar el producto por ID
            $product = $em->getRepository(Product::class)->find($id);
    
            if (!$product) {
                throw $this->createNotFoundException('Producto no encontrado');
            }
    
            // Crear el formulario de edición
            $form = $this->createForm(ProductType::class, $product);
            $form->handleRequest($request);
    
            // Si el formulario es válido, guardar los cambios
            if ($form->isSubmitted() && $form->isValid()) {
                $em->flush();
                return $this->redirectToRoute('app_product_list');
            }
    
            // Renderizar el formulario de edición
            return $this->render('product/edit.html.twig', [
                'form' => $form->createView(),
                'product' => $product,
            ]);
        }
}
