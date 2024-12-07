<?php
// src/Form/ProductType.php
namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    //Este archivo contiene el formulario para crear y editar productos
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nombre', //Para el nombre del producto
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Descripción', //descripción del producto 
            ])
            ->add('price', NumberType::class, [
                'label' => 'Precio',
                'scale' => 2, // asi tiene dos decimales
                'attr' => [
                    'placeholder' => 'Añadir precio',
                    'step' => '0.01', // Permite decimales
                    'min' => '0',    // Prohíbe valores negativos
                ],
            ])
            ->add('stock', NumberType::class, [
                'label' => 'Stock', //cantidad de stock del producto
                'attr' => [
                    'placeholder' => 'Añadir stock',
                    'step' => '1',  // Solo números enteros
                    'min' => '0',   // No negativos
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Guardar producto', // Un botón para guardar el producto
                'attr' => [
                    'class' => 'btn-save', // Clase personalizada para el botón
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class, // Asocia este formulario con la entidad Product
        ]);
    }
}
