<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use PhpParser\Error;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TaskOneController
 * @package App\Controller
 */
class TaskOneController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return Response
     */
    public function index()
    {


        $conn = $this->entityManager->getConnection();


/*
 * Example that need to be fixed.
 */
//        try {
//            $basicSql = 'SELECT p.id, p.number, SUM(i.premium)
//                FROM policy p
//                RIGHT JOIN installment i
//                ON i.policy_id = p.id
//                HAVING COUNT(i.id) > 1';
//            $stmt = $conn->prepare($basicSql);
//            $stmt->execute();
//            dump($stmt->fetchAll());die;
//        } catch (Error $e) {
//            dump($e);
//        }

        try {
            $fixedSql = 'SELECT p.id, p.number, SUM(i.premium) 
                FROM policy p 
                RIGHT JOIN installment i 
                ON i.policy_id = p.id 
                GROUP BY p.id
                HAVING COUNT(i.id) > 1';
            $stmt = $conn->prepare($fixedSql);
            $stmt->execute();
            dump($stmt->fetchAll());die;
        } catch (Error $e) {
            dump($e);
        }


        return new Response(
            '<html><body>Basic query provided.</body></html>'
        );
    }
}