<?php

namespace rs\kaoz4Bundle\Controller;

class BlogController extends BaseContentController
{
    
    protected $class = 'rs\kaoz4Bundle\Entity\Post';
    protected $template = 'kaoz4Bundle:Blog:';
    protected $list_limit = 10;

    public function viewAction( $slug)
    {
        $post = $this->getRepository()->findOneBySlug($slug);

        return $this->render($this->template.'view.html.twig', array(
            'post' => $post,
        ));
    }    
    
    public function sidebarAction($slug=null)
    {
        return $this->render($this->template.'sidebar.html.twig');
    }    
}
