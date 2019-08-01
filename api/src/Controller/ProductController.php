<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

class ProductController extends AbstractController
{
    /**
     * @Route("/api/products", name="api_product_list")
     * 
     */
    public function listAction(Request $request)
    {
        $filter = $request->query->get('filter');
        $qb = $this->getDoctrine()
            ->getRepository('App:Product')
            ->findBy(array($filter));
        return new JsonResponse($qb);
    }
    
}