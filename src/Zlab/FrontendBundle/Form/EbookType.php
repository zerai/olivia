<?php

namespace Zlab\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EbookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('is_activated')
            ->add('created_at')
            ->add('updated_at')
            ->add('category')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zlab\FrontendBundle\Entity\Ebook'
        ));
    }

    public function getName()
    {
        return 'zlab_frontendbundle_ebooktype';
    }
}
