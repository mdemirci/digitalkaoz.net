<?php

namespace rs\kaoz4Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RedirectResponse;
    
use rs\kaoz4Bundle\Util\Pager as Pager;

use rs\kaoz4Bundle\Entity\Comment;

abstract class BaseContentController extends Controller
{
    
    protected $class;
    protected $template;
    protected $list_limit;
    
    protected function getRepository()
    {
        return $this->em()->getRepository($this->class);
    }
    
    protected function em()
    {
        return $this->get('doctrine.orm.entity_manager');
    }
    
    /**
     *
     * @param PostRepository $qb
     * @return Sonata\AdminBundle\Datagrid\ORM\Pager
     */
    protected function getPager($qb)
    {
        $pager = new Pager();
        $pager->setQuery($qb);
        $pager->setPage($this->get('request')->get('page', 1));
        
        return $pager;
    }
    
    public function archiveAction()
    {
        $query = $this->getRepository()->last($this->list_limit);

        $pager = $this->getPager($query);
        $pager->init();

        return $this->render($this->template.'archive.html.twig', array(
            'pager' => $pager,
        ));
    }

    public function latestAction()
    {
        $query = $this->getRepository()->last(5);

        $pager = $this->getPager($query);
        $pager->init();

        return $this->render($this->template.'box.html.twig', array(
            'pager' => $pager
        ));
    }
    
    public function tagsAction($id)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $tags = $this->em()->getRepository('rs\kaoz4Bundle\Entity\Tag')->findByContent($id);
        
        return $this->render('kaoz4Bundle:Components:'.'tags.html.twig', array(
            'tags'  => $tags,
        ));
    }
    
}
