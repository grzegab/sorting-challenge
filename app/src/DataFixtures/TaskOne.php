<?php

namespace App\DataFixtures;

use App\Entity\Installment;
use App\Entity\Policy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TaskOne extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for( $i = 0; $i <= 10; $i++) {
            $policy = new Policy();
            $policy->setNumber($i);
            $policy->setPremium($i * rand(1, 10));
            $policy->setId($i);
            $manager->persist($policy);

            $installment = new Installment();
            $installment->setAdditionalInfo('I am an '. $i);
            $installment->setPolicyId($i);
            $manager->persist($installment);
        }

        $manager->flush();
    }
}