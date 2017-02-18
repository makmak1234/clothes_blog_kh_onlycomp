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
        $formMapper->add('color', 'entity', array('class' => 'AdminBundle:color', 'property' => 'color'))
                    ->add('number')
                    ->add('childrenGoodsSizeNumber', 'sonata_type_model', array('class' => 'AdminBundle\Entity\childrenGoodsSizeNumber', 'property' => 'size.size'))
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
                    ->add('childrenGoodsSizeNumber.size.size')
                    ->add('childrenGoodsSizeNumber.childrenGoods.title')
                    //->add('childrenGoodsSizeNumber.childrenGoods.childrenGoodsCategory.title')
                    /*->add('childrenGoodsSizeNumber.childrenGoods.childrenGoodsSubcategory.childrenGoodsCategory', 'sonata_type_model', array(
                       'associated_property' => 'title'
                    ))*/
                    //->add('childrenGoodsSizeNumber.childrenGoods.childrenGoodsSubcategory.title')
                    ->add('childrenGoodsSizeNumber.childrenGoods.childrenGoodsSubcategory', 'sonata_type_model', array(
                       'associated_property' => 'title'
                    ))
                    ->add('image.path')
                    ->add('draft')
        ;
    }

    public function toString($object)
    {
        return $object instanceof childrenGoodsAdmin
            ? $object->getTitle()
            : 'size childrenGoodsSizeNumber'; // shown in the breadcrumb on the create view 'size childrenGoodsSizeNumber'
    }
}