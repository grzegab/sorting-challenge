<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Service\FakeData;

/**
 * Task three: show table that could be sorted.
 *
 * Class TaskThreeController
 * @package App\Controller
 */
class TaskThreeController extends AbstractController
{
    /**
     * @param Request $request
     * @param FakeData $fakeData
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, FakeData $fakeData)
    {

        // Get fake data to show.
        $records = $fakeData->generateData();

        // Check if there is a key that table should be sorted.
        if($request->query->has('sortBy') && in_array($request->query->get('sortBy'), ['firstName', 'lastName', 'address'])) {
            array_multisort(array_column($records, $request->query->get('sortBy')), SORT_ASC, $records);
        }

        return $this->render('table.html.twig', [
            'records' => $records
        ]);
    }


}