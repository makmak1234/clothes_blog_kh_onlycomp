<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
//use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
//use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
//use AdminBundle\Entity\size;
//use AdminBundle\Entity\childrenGoodsSizeNumber;
use AdminBundle\Entity\childrenGoodsSizeNumber;
use Doctrine\Common\Persistence\ObjectManager;
use AdminBundle\Form\DataTransformer\IssueToNumberTransformer;
//use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class bagRegisterType extends AbstractType
{
    /*private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }*/

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('city')
            ->add('tel')
            ->add('comment')
            /*->add('regDatetime', DateTimeType::class, 
                array('input' => 'datetime', 
                    //'months' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'        , '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '         12'),
                    'choice_translation_domain' => true,
                    'placeholder' => array(
                        'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
                    )
                ))*/
        ;

        //$builder->get('childrenGoodsSizeNumber')
        //    ->addModelTransformer(new IssueToNumberTransformer($this->manager));
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\bagRegister'
        ));
    }

    /*public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                'm' => 'Male',
                'f' => 'Female',
            )
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }*/
}
