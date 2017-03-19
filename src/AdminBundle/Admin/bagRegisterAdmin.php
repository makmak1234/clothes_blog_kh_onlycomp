<?php
// src/AppBundle/Admin/CategoryAdmin.php
namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class bagRegisterAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('orderclient', 'text')
                    ->add('name', 'text')
                    ->add('city', 'text')
                    ->add('tel', 'text')
                    ->add('email', 'text')
                    ->add('comment', 'text')
                    ->add('regDatetime', 'datetime')
                    ->add('buyClients', 'sonata_type_model', array(
                        'class' => 'UserBundle\Entity\buyClients',
                        'property' => 'size',
                        'multiple' => true
                    ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('orderclient')
                        ->add('name')
                        //->add('buyClients', 'sonata_type_model', array(
                        //    'associated_property' => 'size'
                        //))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('orderclient', 'text')
                    ->add('name', 'text')
                    ->add('city', 'text')
                    ->add('tel', 'text')
                    ->add('email', 'text')
                    ->add('comment', 'text')
                    ->add('regDatetime', 'datetime')
                    ->add('buyClients', 'sonata_type_model', array(
                        'associated_property' => 'size'
                    ))
                    //->add('buyClients.size', 'text')
                    //->add('buyClients.childrenGoods', 'sonata_type_model', array(
                     //   'associated_property' => 'title'
                    //))
        ;
    }
}