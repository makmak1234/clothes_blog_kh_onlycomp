<?php
// src/AppBundle/Admin/CategoryAdmin.php
namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class buyClientsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('size', 'text')
                    ->add('color', 'text')
                    ->add('nid', 'text')
                    ->add('priceone', 'text')
                    ->add('valuta', 'text')
                    ->add('bagRegister', 'sonata_type_model', array(
                        'class' => 'UserBundle\Entity\bagRegister',
                        'property' => 'orderclient'
                    ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('size')
                        ->add('priceone')
                        //->add('buyClients', 'sonata_type_model', array(
                        //    'associated_property' => 'size'
                        //))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('size', 'text')
                    ->add('color', 'text')
                    ->add('nid', 'text')
                    ->add('priceone', 'text')
                    ->add('valuta', 'text')
                    //->add('bagRegister', 'sonata_type_model', array(
                    //    'associated_property' => 'orderclient'
                    //))
                    //->add('orderclient', 'currency', array(
                     //   'currency' => $this->getBagRegister()->getOrderclient()
                    //))
                    ->add('bagRegister.orderclient', 'text')
                    ->add('bagRegister', 'sonata_type_model', array(
                        'associated_property' => 'name'
                    ))
                    ->add('childrenGoods', 'sonata_type_model', array(
                        'associated_property' => 'title'
                    ))
                    //->add('buyClients.size', 'text')
                    //->add('buyClients.childrenGoods', 'sonata_type_model', array(
                     //   'associated_property' => 'title'
                    //))
        ;
    }
}