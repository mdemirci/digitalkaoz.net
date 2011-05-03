<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace rs\kaoz4Bundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

use Knplabs\Bundle\MenuBundle\Menu;
use Knplabs\Bundle\MenuBundle\MenuItem;

class TagAdmin extends Admin
{
    protected $baseRouteName = "tag_admin";

    protected $formOptions = array(
        'validation_groups' => 'admin'
    );
    
    protected $list = array(
        'name' => array('identifier' => true,'type'=>'string'),
#        'enabled'=> array('type'=>'boolean'),
    );

    protected $form = array(
        'id',
        'name' => array('type' => 'string'), 
#        'enabled' => array('type'=>'boolean', 'form_field_options' => array('required' => false))
    );
    
    protected $formGroups = array(
        'General' => array(
            'fields' => array('name')
        )
    );

    protected $filter = array(
        'name' => array('type'=>'string')
    );
    
}