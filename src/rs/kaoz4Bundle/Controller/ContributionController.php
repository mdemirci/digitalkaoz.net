<?php

namespace rs\kaoz4Bundle\Controller;

class ContributionController extends BaseContentController
{
    
    protected $class = 'rs\kaoz4Bundle\Entity\Contribution';
    protected $template = 'kaoz4Bundle:Contribution:';
    protected $list_limit = 10;
 
    public function viewAction($slug)
    {
        $contribution = $this->getRepository()->findOneBySlug($slug);

        return $this->render($this->template.'view.html.twig', array(
            'contribution' => $contribution,
        ));
    }
    
    public function sidebarAction($id = null)
    {
        return $this->render($this->template.'sidebar.html.twig', array(
            'contribution' => $this->getRepository()->find($id)
        ));
    }    
    
}
