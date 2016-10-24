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
                /*->add('draft', 'choice',  array(
                                            'multiple' => false,
                                            'choices' => array(
                                                'g' => 'green',
                                                'b' => 'blue'
                                            )
                    ))*/
                //->add('childrenGoodsCategory', 'entity', array('class' => 'AdminBundle:childrenGoodsCategory', 'property' => 'title', 'required' => false))
                //->add('childrenGoodsSubcategory', 'entity', array('class' => 'AdminBundle:childrenGoodsSubcategory', 'property' => 'title', 'required' => false))
                //->add('descriptionGoods', 'entity', array('class' => 'AdminBundle:descriptionGoods', 'property' => 'description', 'required' => false))
                /*->add('priceGoods', 'entity', array( // MoneyType::class,
                    'class' => 'AdminBundle:priceGoods', 'property' => 'rub', 'required' => false
                    ))*/
                /*->add('childrenGoodsSizeNumber', 'entity', array('class' => 'AdminBundle:size', 
                    'property' => 'size',//array('size', 'entity', array('class' => 'AdminBundle:size', 'property' => 'size', 'required' => false)), 
                    'required' => false,
                    'choices_as_values' => true,
                    'expanded' => true,
                    'multiple' => true,
                    'invalid_message' => 'That is not a valid issue number',
                    ))*/
            ->end()
            ->with('Meta data', array('class' => 'col-md-3'))
                /*->add('childrenGoodsCategory', EntityType::class, array(
                    // query choices from this entity
                    'class' => 'AdminBundle:childrenGoodsCategory',
                    // use the User.username property as the visible option string
                    'choice_label' => 'title',
                ))*/
                ->add('childrenGoodsCategory', 'sonata_type_model', array(
                    'class' => 'AdminBundle\Entity\childrenGoodsCategory',
                    'property' => 'title',
                ))
                /*->add('childrenGoodsCategory', 'sonata_type_admin', ['required' => true, 'btn_add' => true,  'btn_list' => true, 'btn_catalogue' => true, 'btn_delete' => true ])*/

                /*->add('childrenGoodsSubcategory', 'sonata_type_model_autocomplete', array(
                    'property' => 'title',
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getTitle();
                    },
                    'multiple' => true,
                ))*/
                ->add('childrenGoodsSubcategory', 'sonata_type_model', array(
                        'class' => 'AdminBundle\Entity\childrenGoodsSubcategory',
                        'property' => 'title',
                        //'multiple' => true
                    ))
                ->add('descriptionGoods', 'sonata_type_model', array('class' => 'AdminBundle:descriptionGoods', 'property' => 'description', 'required' => false))
                ->add('priceGoods', 'sonata_type_model', array(
                    'class' => 'AdminBundle:priceGoods', 'property' => 'rub', 'required' => false
                    ))
            ->end()
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('prodDatetime')//('prodDatetime', 'datetime')
            ->add('prodDatetimeUpdate')
            ->add('title')
            ->add('position')
            ->add('childrenGoodsCategory', null, array(), 'entity', array(
                'class'    => 'AdminBundle\Entity\childrenGoodsCategory',
                'property' => 'title',
            ))
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
            ->add('childrenGoodsCategory.title')
            //->add('childrenGoodsCategory', null, array(
             //   'associated_property' => 'title'))
            ->add('childrenGoodsSubcategory.title')
            ->add('descriptionGoods.description')
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
