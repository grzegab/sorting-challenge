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

        if($request->query->has('sortBy') && in_array($request->query->get('sortBy'), ['firstName', 'lastName', 'address'])) {
            array_multisort(array_column($records, $request->query->get('sortBy')), SORT_ASC, $records);
        }

        //@TODO: tests, comments, description how to use

        return $this->render('table.html.twig', [
            'records' => $records
        ]);
    }


}