<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class childrenGoodsSizeNumberAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('childrenGoods', 'sonata_type_model', array('class' => 'AdminBundle:childrenGoods', 'property' => 'title'))
                    ->add('size', 'sonata_type_model', array('class' => 'AdminBundle:size', 
                        'property' => 'size',
                        //'multiple' => true
                        ))           
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('childrenGoods.title');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper ->add('id')
                    ->addIdentifier('childrenGoods.title')
                    ->add('childrenGoods.childrenGoodsSubcategory', 'sonata_type_model', array(
                        'associated_property' => 'title'
                    ))
                    ->add('size', 'sonata_type_model', array(
                        'associated_property' => 'size'
                    ))
        ;
    }
}