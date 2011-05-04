<?php

namespace rs\kaoz4Bundle\Menu;

use Knplabs\Bundle\MenuBundle\Menu as BaseMenu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Doctrine\ORM\EntityManager;

class Menu extends BaseMenu
{
    /**
     * @param Request $request
     * @param Router $router
     */
    public function __construct(Request $request, Router $router, $menu, EntityManager $em = null)
    {
        parent::__construct();

        $this->setCurrentUri($request->getRequestUri());
        
        switch($menu)
        {
            case 'main' : $this->mainTree($request,$router);break;
            case 'footer' : $this->footerTree($request,$router);break;
            case 'blog' : $this->blogTree($request,$router,$em);break;
            case 'contributions' : $this->contributionTree($request,$router,$em);break;
        }
    }
    
    protected function mainTree(Request $request, Router $router)
    {        
        $this->addChild('Home', $router->generate('homepage'));
        $this->addChild('Blog', $router->generate('blog'));
        $this->addChild('Contributions', $router->generate('contributions'));
        $this->addChild('About', $router->generate('about'));
        
        $this->addChild($this->createExternal('Github', 'https://github.com/digitalkaoz'));
        $this->addChild($this->createExternal('Wordpress', 'http://digitalkaoz.net'));
        
        $this->addChild('Admin Dashboard', $router->generate('sonata_admin_dashboard'));                
    }
    
    protected function blogTree(Request $request, Router $router, EntityManager $em)
    {
        $this->addChild('Blog', $router->generate('blog'));
        
        if($request->get('slug')){
            $this->addChild('permalink',$router->generate('blog_view',array('slug'=>$request->get('slug'))));
        }
    }

    protected function footerTree(Request $request, Router $router)
    {
        $this->addChild('Home', $router->generate('homepage'));
    }
    
    protected function contributionTree(Request $request, Router $router)
    {
        $this->addChild('Projects', $router->generate('contributions'));
        
        if($request->get('slug')){
            $this->addChild('permalink',$router->generate('contribution_view',array('slug'=>$request->get('slug'))));
        }
    }

    protected function createExternal($name,$url)
    {
        $www = $this->createChild($name, $url);
        $www->setLinkAttribute('target','_blank');
        
        return $www;
    }
    
}