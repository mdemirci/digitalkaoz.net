<?php

namespace rs\kaozBundle\Form\Extension;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormBuilder;

/**
 * @see http://henrik.bjrnskov.dk/2011/05/04/symfony2-formtype-extension.html
 */
class FieldTypeExtension extends \Symfony\Component\Form\AbstractTypeExtension
{
    public function getExtendedType()
    {
        return 'field';
    }
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->setAttribute('attr', $options['attr']);
    }

    public function buildView(FormView $view, FormInterface $form)
    {
        $view->set('attr', $form->getAttribute('attr'));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'attr' => array(),
        );
    }
}