<?php

namespace App\Tests;

use App\Command\ListCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;


class ListCommandTest extends KernelTestCase
{
    private function prepareExecution($name)
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        return $application->find($name);

    }

    public function testExecute()
    {
        $command = $this->prepareExecution('random-user');
        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'command'  => $command->getName(),
        ]);

        $output = $commandTester->getDisplay();
        $this->assertNotEmpty($output);
        $this->isJson($output);
        $this->assertCount(20, json_decode($output));
    }

    public function testTableExecute()
    {
        $command = $this->prepareExecution('random-user');
        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'command'  => $command->getName(),
            '-f' => null
        ]);

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertNotEmpty($output);
        $this->assertStringStartsWith(
            '+-', $output
        );

    }
}