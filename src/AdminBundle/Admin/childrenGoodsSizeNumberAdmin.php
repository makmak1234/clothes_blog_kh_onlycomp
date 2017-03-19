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
                    //->add('childrenGoods.childrenGoodsCategory.title')
                    //->add('childrenGoods.childrenGoodsCategory', 'sonata_type_model', array('class' => 'AdminBundle:childrenGoods', 'property' => 'title', 'required' => false))
                    ->add('size', 'sonata_type_model', array('class' => 'AdminBundle:size', 
                        'property' => 'size',
                        //'multiple' => true
                        ))
                    //->add('childrenGoodsColorNumber.color.color')
                    //->add('color', 'sonata_type_model', array('class' => 'AdminBundle:color', 'property' => 'color'))
                    
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
                    //->add('childrenGoodsCategory.title')
                    /*->add('childrenGoods.childrenGoodsSubcategory.childrenGoodsCategory', 'sonata_type_model', array(
                        'associated_property' => 'title'
                    ))*/
                    //->add('childrenGoods.childrenGoodsSubcategory.title')
                    ->add('childrenGoods.childrenGoodsSubcategory', 'sonata_type_model', array(
                        'associated_property' => 'title'
                    ))
                   // ->add('childrenGoods.childrenGoodsSubcategory.title', 'sonata_type_model', array('class' => 'AdminBundle:childrenGoods', 'property' => 'title', 'required' => false))
                    //->add('size.size')
                    ->add('size', 'sonata_type_model', array(
                        'associated_property' => 'size'
                    ))
        ;
    }
}