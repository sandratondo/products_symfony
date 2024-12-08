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
    // Crear un nuevo producto.
     
    #[Route('/product/create', name: 'app_product_create')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        // Crear un nuevo producto vacío
        $product = new Product();

        // Crear el formulario asociado al producto
        $form = $this->createForm(ProductType::class, $product);

        // Manejar la solicitud del formulario
        $form->handleRequest($request);

        // Si el formulario es válido, guardar el producto
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->persist($product); // Persistir el producto en Doctrine
                $em->flush(); // Guardar los cambios en la base de datos

                $this->addFlash('success', '¡El producto se ha creado correctamente!');
                
                return $this->redirectToRoute('app_product_list');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Hubo un error al crear el producto. Inténtalo de nuevo.');
            }
        }

        // Renderizar la plantilla del formulario de creación
        return $this->render('product/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //Listar todos los productos
  
    #[Route('/product', name: 'app_product_list')]
    public function list(EntityManagerInterface $em): Response
    {
        // Recuperar todos los productos de la base de datos
        $products = $em->getRepository(Product::class)->findAll();

        // Renderizar la vista de la lista de productos
        return $this->render('product/list.html.twig', [
            'products' => $products,
        ]);
    }

    // editar un producto utilizando un formulario.
    #[Route('/product/edit/{id}', name: 'app_product_edit')]
    public function edit($id, Request $request, EntityManagerInterface $em): Response
    {
        // Buscar el producto por su ID
        $product = $em->getRepository(Product::class)->find($id);

        // Si el producto no existe, agregar un mensaje flash de error y redirigir
        if (!$product) {
            $this->addFlash('error', '¡El producto no existe!');
            return $this->redirectToRoute('app_product_list');
        }

        // Crear el formulario asociado al producto
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        // Si el formulario es válido, guardar los cambios
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush(); // Guardar los cambios en la base de datos

                // Agregar un mensaje flash de éxito
                $this->addFlash('success', '¡El producto se ha actualizado correctamente!');
                
                return $this->redirectToRoute('app_product_list');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Hubo un error al actualizar el producto. Inténtalo de nuevo.');
            }
        }

        // Renderizar la plantilla del formulario de edición
        return $this->render('product/edit.html.twig', [
            'form' => $form->createView(),
            'product' => $product,
        ]);
    }

    // método para Eliminar un producto.
    #[Route('/product/delete/{id}', name: 'app_product_delete', methods: ['POST', 'DELETE'])]
    public function delete($id, EntityManagerInterface $em): Response
    {
        // Buscar el producto ID
        $product = $em->getRepository(Product::class)->find($id);

        // Si el producto no existe, agregar un mensaje flash de error y redirigir
        if (!$product) {
            $this->addFlash('error', '¡El producto no existe!');
            return $this->redirectToRoute('app_product_list');
        }

        try {
            // Eliminar el producto de la base de datos
            $em->remove($product);
            $em->flush();

            $this->addFlash('success', '¡El producto se ha eliminado correctamente!');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Hubo un error al eliminar el producto. Inténtalo de nuevo.');
        }

        return $this->redirectToRoute('app_product_list');
    }
}
