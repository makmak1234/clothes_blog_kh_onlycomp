<?php
// src/AppBundle/Admin/CategoryAdmin.php
namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class priceGoodsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('rub', 'text')
                    ->add('uah', 'text')
                    ->add('usd', 'text')
                    ->add('eur', 'text')
                    ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('rub');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                    ->addIdentifier('rub', 'text')
                    ->add('uah', 'text')
                    ->add('usd', 'text')
                    ->add('eur', 'text')
        ;
    }
}