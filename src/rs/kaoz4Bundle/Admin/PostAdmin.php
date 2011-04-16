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
use Sonata\AdminBundle\Route\RouteCollection;

use Knplabs\Bundle\MenuBundle\Menu;
use Knplabs\Bundle\MenuBundle\MenuItem;

use rs\kaoz4Bundle\Entity\Comment;

class PostAdmin extends Admin
{
    protected $baseRouteName = "blogpost_admin";
    protected $baseRoutePattern = "blog_post";
    
    protected $userManager;

    protected $formOptions = array(
        'validation_groups' => 'admin'
    );

    protected $list = array(
        'title' => array('identifier' => true,'type'=>'string'),
        'author' => array('type'=>'string'),
        'enabled'=> array('type'=>'boolean'),
        'commentsEnabled',
    );

    protected $form = array(
        #'author' => array('type'=>'choice','choices'=>array('foo','bar')),
        'enabled' => array('form_field_options' => array('required' => false)),
        #'image' => array('type'=>'input'),
        'title',
        'abstract',
        'content',
        'tags'     => array('edit' => 'list','form_field_options' => array('expanded'=>true)),
        'commentsCloseAt',
        'commentsEnabled' => array('form_field_options' => array('required' => false)),
    );

    protected $formGroups = array(
        'General' => array(
            'fields' => array('title', 'abstract', 'content'),
        ),
        'Tags' => array(
            'fields' => array('tags'),
        ),
        'Options' => array(
            'fields' => array('enabled', 'commentsCloseAt', 'commentsEnabled', 'commentsDefaultStatus'),
            'collapsed' => true
        )
    );

    protected $filter = array(
        'title'=>array('type'=>'string'),
        'enabled',array('type'=>'boolean'),
        'tags' => array('filter_field_options' => array('expanded' => true, 'multiple' => true))
    );

    public function configureFormFields(FormMapper $form)
    {
        #$form->add('author', array('choices' => array('foo','bar')), array('type' => 'choice'));
        #$form->add('image', array(), array('edit' => 'list', 'link_parameters' => array('context' => 'news')));
        $form->add('commentsDefaultStatus', array('choices' => Comment::getStatusList()), array('type' => 'choice'));
    }

    public function configureDatagridFilters(DatagridMapper $datagrid)
    {
        $datagrid->add('with_open_comments', array(
            'template' => 'SonataAdminBundle:CRUD:filter_callback.html.twig',
            'type' => 'callback',
            'filter_options' => array(
                'filter' => array($this, 'getWithOpenCommentFilter'),
                'field'  => array($this, 'getWithOpenCommentField')
            ),
            'filter_field_options' => array(
                'required' => false
            )
        ));
    }

    public function getWithOpenCommentFilter($queryBuilder, $alias, $field, $value)
    {

        if (!$value) {
            return;
        }

        $queryBuilder->leftJoin(sprintf('%s.comments', $alias), 'c');
        $queryBuilder->andWhere('c.status = :status');
        $queryBuilder->setParameter('status', Comment::STATUS_MODERATE);
    }

    public function getWithOpenCommentField($filter)
    {

        return new \Symfony\Component\Form\CheckboxField(
            $filter->getName(),
            array()
        );
    }

    public function preInsert($post)
    {
        parent::preInsert($post);

        if (isset($this->formFieldDescriptions['author'])) {
            $this->getUserManager()->updatePassword($post->getAuthor());
        }
    }

    public function preUpdate($post)
    {
        parent::preUpdate($post);

        if (isset($this->formFieldDescriptions['author'])) {
            $this->getUserManager()->updatePassword($post->getAuthor());
        }
    }

    public function getSideMenu($action, Admin $childAdmin = null)
    {

        if ($childAdmin || in_array($action, array('edit'))) {
            return $this->getEditSideMenu();
        }

        return false;
    }

    public function getEditSideMenu()
    {

        $menu = new Menu;

        $admin = $this->isChild() ? $this->getParent() : $this;

        $id = $admin->getRequest()->get('id');

        $menu->addChild(
            $this->trans('view_post'),
            $admin->generateUrl('edit', array('id' => $id))
        );

          $menu->addChild(
            $this->trans('view_comment'),
            $admin->generateUrl('comments',array('post'=>$id))
        );

        return $menu;
    }

    public function setUserManager($userManager)
    {
        $this->userManager = $userManager;
    }

    public function getUserManager()
    {
        return $this->userManager;
    }
    
    
    public function configureRoutes(RouteCollection $collection) {
        $collection->add('duplicate');
        $collection->add('comments', $this->getRouterIdParameter() . '/comments');
    }

}