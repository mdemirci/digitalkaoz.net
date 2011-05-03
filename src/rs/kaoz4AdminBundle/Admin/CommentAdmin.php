<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace rs\kaoz4AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

use rs\kaoz4AdminBundle\Entity\Comment;

class CommentAdmin extends Admin
{
    protected $baseRouteName = "comment_admin";

#    protected $parentAssociationMapping = array('post'=>'0');
    
    protected $list = array(
        'name' => array('identifier'=>true  ),
#        'post' => array('type'=>'string'),
        'email',
#        'homepage',
        'text',
        'enabled',
        'created_at'
    );

    protected $form = array(
        'name',
        'email',
        'homepage' => array('required'=>false),
        'text',
        'homepage',
        'enabled'
#        'post' => array('edit' => 'list'),
#        'status' => array('type' => 'choice'),
    );

    protected $formGroups = array(
        'General' => array(
            'fields' => array('name', 'email', 'homepage', 'text','enabled')
        )
    );

    protected $filter = array(
        'name',
        'email',
        'text',
    );

    public function configureFormFields(FormMapper $form)
    {
        #$form->add('status', array('choices' => Comment::getStatusList()), array('type' => 'choice'));
    }


    public function getBatchActions()
    {

        return array(
            'delete'    => 'action_delete',
            'enabled'   => 'enable_comments',
            'disabled'  => 'disabled_comments',
        );
    }
}