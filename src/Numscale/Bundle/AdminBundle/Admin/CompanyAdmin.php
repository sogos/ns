<?php
/**
 * Created by PhpStorm.
 * User: tcordier
 * Date: 15/06/14
 * Time: 08:43
 */

namespace Numscale\Bundle\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CompanyAdmin extends Admin {

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Name'))
            ->add('address', 'text', array('label' => 'Address'))
            ->add('city', 'text', array('label' => 'City'))
            ->add('postal_code', 'text', array('label' => 'Postal Code'))
            ->add('country', 'country', array('label' => 'Country'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('city')
            ->add('postal_code')
            ->add('country')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('country')
            ->add('city')
            ->add('users')
        ;
    }
} 