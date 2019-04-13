<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Service\FakeData;

class TaskTwoController extends AbstractController
{
    public function index(Request $request, FakeData $fakeData)
    {

        $records = $fakeData->generateData();


        $firstName = array_column($records, 'firstName');
        $lastName = array_column($records, 'lastName');
        $address = array_column($records, 'address');

        array_multisort($firstName, SORT_ASC, $lastName, SORT_ASC, $address, SORT_ASC, $records);

        //@TODO: sorting by columns, table look, tests, comments, description how to use

        return $this->render('table.html.twig', ['records' => $records]);
    }


}