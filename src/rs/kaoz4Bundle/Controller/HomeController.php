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
        //return array('name'=>'foo');
        return $this->render('kaoz4:Home:index.html.twig',array('name'=>'foo'));
    }
}