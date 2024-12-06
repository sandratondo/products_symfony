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
                'label' => 'Product Name', //Para el nombre del producto
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Product Description', //descripción del producto 
            ])
            ->add('price', NumberType::class, [
                'label' => 'Product Price',
                'scale' => 2, // asi tiene dos decimales
            ])
            ->add('stock', NumberType::class, [
                'label' => 'Product Stock', //cantidad de stock del producto
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Save Product', // Un botón para guardar el producto
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class, // Asocia este formulario con la entidad Product
        ]);
    }
}
