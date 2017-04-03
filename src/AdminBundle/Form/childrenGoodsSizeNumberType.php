<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class childrenGoodsSizeNumberType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('childrenGoods', 'entity', array('class' => 'AdminBundle:childrenGoods', 'property' => 'title', 'required' => false))
            ->add('size', 'entity', array('class' => 'AdminBundle:size', 'property' => 'size', 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdminBundle\Entity\childrenGoodsSizeNumber'
        ));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'AdminBundle\Entity\childrenGoodsSizeNumber',
        );
    }
}
