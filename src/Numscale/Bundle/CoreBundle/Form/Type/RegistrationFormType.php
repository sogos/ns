<?php
/**
 * Created by PhpStorm.
 * User: tcordier
 * Date: 14/06/14
 * Time: 08:13
 */

namespace Numscale\Bundle\CoreBundle\Form\Type;


use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends BaseType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder,$options);
        $builder->add('company', 'numscale_company_form', array(
            'error_bubbling' => true,
            'cascade_validation' => true
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Numscale\Bundle\CoreBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'numscale_user_registration';
    }
} 