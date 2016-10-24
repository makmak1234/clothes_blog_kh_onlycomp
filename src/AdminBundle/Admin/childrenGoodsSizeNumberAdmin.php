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
        $formMapper->add('childrenGoods', 'entity', array('class' => 'AdminBundle:childrenGoods', 'property' => 'title', 'required' => false))
                    ->add('size', 'entity', array('class' => 'AdminBundle:size', 'property' => 'size', 'required' => false))
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
                    ->add('size.size')
        ;
    }
}