<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\FakeData;

class TaskTwoController
{
    public function index(Request $request, FakeData $fakeData)
    {
        dump($fakeData->generateData());
        die;
        return new Response(
            '<html><body>Table.</body></html>'
        );
    }


}