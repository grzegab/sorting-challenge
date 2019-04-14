<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Runner\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TaskOneController.
 * @package App\Controller
 */
class TaskOneController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * TaskOneController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Example of good query usage.
     *
     * @return Response
     * @throws \Doctrine\DBAL\DBALException
     */
    public function index()
    {
        $conn = $this->entityManager->getConnection();

        try {
            $fixedSql = 'SELECT p.id, p.number, SUM(i.premium) 
                FROM policy p 
                RIGHT JOIN installment i 
                ON i.policy_id = p.id 
                GROUP BY p.id
                HAVING COUNT(i.id) > 1';
            $stmt = $conn->prepare($fixedSql);
            $stmt->execute();
            $stmt->fetchAll();
        } catch (Exception $e) {
            dump($e);
        }

        return $this->render('db.html.twig');
    }
}