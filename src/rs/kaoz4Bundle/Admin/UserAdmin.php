<?php

namespace rs\kaoz4Bundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
/**
 * Description of UserAdmin
 *
 * @author caziel
 */
class UserAdmin extends Admin
{
    protected $baseRouteName = "user_admin";
    protected $baseRoutePattern = "user";
    
    protected $formOptions = array(
        'validation_groups' => 'admin'
    );

    protected $list = array(
        'username' => array('identifier' => true),
        'email',
        'enabled',
        'createdAt',
        'lastLogin',
#     'groups',
        'locked',
        'expired',
    );

    protected $form = array(
        'username',
        'email',
        'enabled' => array('form_field_options' => array('required' => false)),
#     'groups' => array('edit' => 'list', 'type'=>'rs\kaoz4Bundle\Ent'),
#     'expiresAt',
#     'roles',
            #'author' => array('edit' => 'list'),        
#        'enabled' => array('form_field_options' => array('required' => false)),
#        'title',
#        'abstract',
#        'content',
//        'tags'     => array('form_field_options' => array('expanded' => true)),
#        'commentsCloseAt',
#        'commentsEnabled' => array('form_field_options' => array('required' => false)),
    );
}
