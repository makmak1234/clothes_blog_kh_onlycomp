<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class childrenGoodsSubcategoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', 'text')
                    ->add('childrenGoods', 'sonata_type_model', array(
                        'class' => 'AdminBundle\Entity\childrenGoods',
                        'property' => 'title',
                        'multiple' => true
                    ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title')
                    ->add('childrenGoods', 'sonata_type_model', array(
                        'associated_property' => 'title'
                    ))
                    ->add('childrenGoodsCategory', 'sonata_type_model', array(
                        'associated_property' => 'title'
                    ))
        ;
    }
}