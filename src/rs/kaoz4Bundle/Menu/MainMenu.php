<?php

namespace rs\kaoz4Bundle\Menu;

use Knplabs\Bundle\MenuBundle\Menu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

class MainMenu extends Menu
{
    /**
     * @param Request $request
     * @param Router $router
     */
    public function __construct(Request $request, Router $router)
    {
        parent::__construct();

        $this->setCurrentUri($request->getRequestUri());

        $github = $this->createChild('Github', 'https://github.com/digitalkaoz');
        $github->setLinkAttribute('target','_blank');
        
        $this->addChild('Home', $router->generate('homepage'));                
        $this->addChild($this->blogTree($router));
        
        $this->addChild($github);
        $this->addChild('Wordpress', 'http://digitalkaoz.net');
    }
    
    protected function blogTree(Router $router)
    {
        $node = $this->createChild('Blog', $router->generate('blog_home'));
        
        $node->addChild('home',$router->generate('blog_home'));
        $node->addChild('tags',$router->generate('blog_tags'));
        $node->addChild('categories',$router->generate('blog_categories'));
        
        return $node;
    }
}