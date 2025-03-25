<?php
namespace App\Form;

use App\Entity\Libro;
use App\Entity\Autores;
use App\Entity\Editorial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Esto se usa para las relaciones con otras entidades
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LibroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Construimos el formulario con los campos que se requieren
        $builder
            ->add('titulo', TextType::class, [
                'label' => 'Título del libro',
                'attr' => ['placeholder' => 'Introduce el título del libro'],
            ])
            ->add('editorial', EntityType::class, [
                'class' => Editorial::class,
                'choice_label' => 'nombre', // Usamos el campo 'nombre' para mostrar la editorial
                'placeholder' => 'Selecciona una editorial',
                'required' => true,
            ])
            ->add('autor', EntityType::class, [
                'class' => Autores::class,  // Aquí definimos que el campo es de la entidad 'Autores'
                'choice_label' => 'nombre', // Definimos qué atributo de la entidad mostrar en el select (por ejemplo, 'nombre')
                'placeholder' => 'Selecciona un autor', // Mensaje que aparece en el desplegable
                'required' => true,  // Hacemos el campo obligatorio
                'disabled' => true,  // Deshabilitado inicialmente
            ])
            ->add('a_publicacion', IntegerType::class, [
                'label' => 'Año de publicación',
                'attr' => ['placeholder' => 'Introduce el año de publicación'],
            ])
            ->add('guardar', SubmitType::class, [
                'label' => 'Guardar libro',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Libro::class, // Vincula este formulario con la entidad Libro
        ]);
    }
}
