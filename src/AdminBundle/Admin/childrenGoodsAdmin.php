<?php
namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;


class childrenGoodsAdmin extends AbstractAdmin
{
    public $supportsPreviewMode = true;

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', array('class' => 'col-md-9'))
                ->add('prodDatetime', 'date')//('prodDatetime', 'datetime')
                ->add('prodDatetimeUpdate', 'datetime'//,DateTimeType::class, 
                    //array('input' => 'datetime', 
                       // 'choice_translation_domain' => true,
                       // 'placeholder' => array(
                        //    'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
                        //)
                    )//)
                    //('prodDatetimeUpdate', DateType::class)
                ->add('title')
                ->add('position')
                ->add('draft', 'choice',array(
                                            'choices' => array(
                                                '1' => 'green',
                                            ),
                                            'expanded' => true,
                                            'required' => false,
                                        )
                        )
                
            ->end()
            ->with('Meta data', array('class' => 'col-md-3'))
                ->add('descriptionGoods', 'sonata_type_model', array('class' => 'AdminBundle:descriptionGoods', 'property' => 'description'))
                ->add('priceGoods', 'sonata_type_model', array(
                    'class' => 'AdminBundle:priceGoods', 'property' => 'rub'
                    ))
                /*->add('size', 'sonata_type_model', array(
                        'class' => 'AdminBundle\Entity\size',
                        'property' => 'size',
                        'multiple' => true
                    ))
                ->add('childrenGoodsSubcategory', 'sonata_type_model', array(
                        'class' => 'AdminBundle\Entity\childrenGoodsSubcategory',
                        'property' => 'title',
                        'multiple' => true
                    ))*/
            ->end()
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('prodDatetime')//('prodDatetime', 'datetime')
            ->add('prodDatetimeUpdate')
            ->add('title')
            ->add('position')
            /*->add('childrenGoodsCategory', null, array(), 'entity', array(
                'class'    => 'AdminBundle\Entity\childrenGoodsCategory',
                'property' => 'title',
            ))*/
            ->add('draft')
            ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('prodDatetime')
            ->add('prodDatetimeUpdate')
            ->addIdentifier('title')
            ->add('position')
            ->add('childrenGoodsSubcategory', 'sonata_type_model', array(
                        'associated_property' => 'title'
                    ))
            ->add('descriptionGoods.description')
            /*->add('size', 'sonata_type_model', array(
                        'associated_property' => 'size'
                    ))*/
            ->add('priceGoods.rub')
            ->add('childrenGoodsSizeNumber.size.size')
            ->add('draft')
            /*->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                    'clone' => array(
                        'template' => 'UserBundle::calculateCatSubcat.html.twig'
                    )
                )
            ))*/
            /*->addIdentifier('childrenGoodsSizeNumber', null, array(
                 'route' => array(
                     'size' => 'show'
                 )
             ))*/
            //->add('childrenGoodsSizeNumber', null, array(
            //'associated_property' => 'size'))
            /*->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))*/
        ;
    }

    public function toString($object)
    {
        return $object instanceof childrenGoodsAdmin
            ? $object->getTitle()
            : 'childrenGoods childrenGoodsCategory'; // shown in the breadcrumb on the create view
    }
}
