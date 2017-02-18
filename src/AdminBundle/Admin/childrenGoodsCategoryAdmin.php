<?php
// src/AppBundle/Admin/CategoryAdmin.php
namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class childrenGoodsCategoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', 'text')
                    ->add('childrenGoodsSubcategory', 'sonata_type_model', array(
                        'class' => 'AdminBundle\Entity\childrenGoodsSubcategory',
                        'property' => 'title',
                        'multiple' => true
                    ))
                    ->add('image', 'sonata_type_model', array(
                        'class' => 'AdminBundle\Entity\image',
                        'property' => 'path',
                    ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title')
                        ->add('childrenGoodsSubcategory.title')
                        //->add('childrenGoodsSubcategory', 'sonata_type_model', array(
                        //    'associated_property' => 'title'
                        //))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title')
                    //->add('childrenGoodsSubcategory.title')
                    ->add('childrenGoodsSubcategory', 'sonata_type_model', array(
                        'associated_property' => 'title'
                    ))
                    ->add('image.path')
        ;
    }
}