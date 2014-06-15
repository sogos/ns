<?php
/**
 * Created by PhpStorm.
 * User: tcordier
 * Date: 14/06/14
 * Time: 08:21
 */

namespace Numscale\Bundle\CoreBundle\Form\Type;


use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompanyType extends AbstractType {


    public function __construct(Translator $translator) {
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text', array(
            ))
            ->add('address', 'textarea')
            ->add('city', 'text')
            ->add('postal_code', 'text')
            ->add('country', 'country',array(
                'empty_value' => $this->translator->trans("form.company.select.country")
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Numscale\Bundle\CoreBundle\Entity\Company',
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'numscale_company_form';
    }
} 