<?php
namespace rs\kaoz4Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @extra:Route("/", name="homepage")
     * @extra:Template()
     */    
    public function indexAction()
    {
        return $this->render('kaoz4Bundle:Home:index.html.twig');
    }
    
    /**
     * @extra:Route("/about", name="about")
     * @extra:Template()
     */    
    public function aboutAction()
    {
        return $this->render('kaoz4Bundle:Home:about.html.twig');
    }
    
    /**
     * @extra:Route("/widget/{widget}", name="widget")
     * @extra:Template()
     */    
    public function widgetAction($widget)
    {
        switch($widget)
        {
            case 'socials' : return $this->render('kaoz4Bundle:Components:socials.html.twig');
            case 'footer' : return $this->render('kaoz4Bundle:Components:footer.html.twig');
            case 'header' : return $this->render('kaoz4Bundle:Components:header.html.twig');
                
        }
        
    }
        
}