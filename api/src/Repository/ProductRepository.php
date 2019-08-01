<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null) {
        $count = count($criteria);
        $filter = $criteria[0];
        $qb = $this->createQueryBuilder('Product');
        if ($count > 0) {
            $qb->andWhere('Product.title LIKE :filter')
                ->setParameter('filter', '%'.$filter.'%');
        }
        $result = $qb->getQuery()->getResult();
        
        $resultCount = count($result);
        if( $resultCount > 0){
            return $result;
        }else{
            return $this->recommendedProducts($filter);
        }
    }

    public function recommendedProducts($filter){
        $recommendedProduct = [];
        $qb = $this->createQueryBuilder('Product');
        $qb->andWhere('Product.brand LIKE :filter ORDER BY Product.price')
                ->setParameter('filter', '%'.$filter.'%');
        $result = $qb->getQuery()->getResult();
        $recommendedProduct['recommandedResult'] = $result;
        return $recommendedProduct;
    }
   
}