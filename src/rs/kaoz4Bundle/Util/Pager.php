<?php

namespace rs\kaoz4Bundle\Util;

use Sonata\AdminBundle\Datagrid\ORM\Pager as BasePager;
use Doctrine\ORM\Query;

class Pager extends BasePager
{

    public function computeNbResult()
    {
        $countQuery = clone $this->getQuery();

        if (count($this->getParameters()) > 0) {
            $countQuery->setParameters($this->getParameters());
        }

        $countQuery->select(sprintf('DISTINCT count(%s.%s) as cnt', $countQuery->getRootAlias(), $this->getCountColumn()));

        return $countQuery->getQuery()->getSingleScalarResult();
    }    
    
    /**
     * Get all the results for the pager instance
     *
     * @param mixed $hydrationMode A hydration mode identifier
     * @return array
     */
    public function getResults($hydrationMode = Query::HYDRATE_OBJECT)
    {
        return $this->getQuery()->getQuery()->execute(array(), $hydrationMode);
    }    
}

