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

class ContributionAdmin extends BaseContentAdmin
{
    protected $baseRouteName = "contribution_admin";

    protected $form = array(
        #'author' => array('type'=>'choice','choices'=>array('foo','bar')),
        'enabled' => array('form_field_options' => array('required' => false)),
        'url',
        'title',
        'abstract',
        'content',
        'tags'     => array('edit' => 'list','form_field_options' => array('expanded'=>true)),
#        'commentsCloseAt',
        'comments_enabled' => array('form_field_options' => array('required' => false)),
        'tags_enabled' => array('form_field_options' => array('required' => false)),
    );
    
}