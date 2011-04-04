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
        return $this->render('kaoz4Bundle:Home:index.html.twig',array('name'=>'foo'));
    }
}