<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class childrenGoodsColorNumberAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('color', 'entity', array('class' => 'AdminBundle:color', 'property' => 'color', 'required' => false))
                    ->add('number')
                    ->add('childrenGoodsSizeNumber', 'entity', array('class' => 'AdminBundle:childrenGoodsSizeNumber', 'property' => 'id', 'required' => false))
                    ->add('image', 'sonata_type_model', array(
                        'class' => 'AdminBundle\Entity\image',
                        'property' => 'path',
                    ))
                    ->add('draft', 'choice',array(
                                            'choices' => array(
                                                '1' => 'green',
                                            ),
                                            'expanded' => true,
                                            'required' => false,
                                        )
                        )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('color.color');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('color.color')
                    ->addIdentifier('number')
                    ->add('childrenGoodsSizeNumber.id')
                    ->add('image.path')
                    ->add('draft')
        ;
    }
}