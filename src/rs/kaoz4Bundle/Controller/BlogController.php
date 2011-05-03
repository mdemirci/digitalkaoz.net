<?php

namespace rs\kaoz4Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RedirectResponse;
    
use Sonata\AdminBundle\Datagrid\ORM\Pager as Pager;

use rs\kaoz4Bundle\Entity\Comment;

class BlogController extends Controller
{
    protected $class = 'rs\kaoz4Bundle\Entity\Post';
    protected $list_limit = 10;
    
    protected function getRepository()
    {
        return $this->get('doctrine.orm.entity_manager')
            ->getRepository($this->class);
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

        return $this->render('kaoz4Bundle:Blog:archive.html.twig', array(
            'pager' => $pager,
        ));
    }

    public function viewAction($year, $month, $day, $slug)
    {
        $post = $this->getRepository()->findOneBySlug($slug);

        return $this->render('kaoz4Bundle:Blog:view.html.twig', array(
            'post' => $post,
        ));
    }
    
    public function commentsAction($post_id)
    {

        $em = $this->get('doctrine.orm.entity_manager');

        $comments = $em->getRepository('rs\kaoz4Bundle\Entity\Comment')
            ->createQueryBuilder('c')
            ->where('c.content = :post_id')
            ->orderBy('c.created_at', 'ASC')
            ->getQuery()
            ->setParameters(array(
                'post_id'   => $post_id,
//                'status'    => Comment::STATUS_VALID,
            ))
            ->execute();


        return $this->render('kaoz4Bundle:Blog:comments.html.twig', array(
            'comments'  => $comments,
        ));
    }
    
}
