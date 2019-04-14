<?php

namespace App\Command;

use App\Service\FakeData;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class TaskTwoCommand
 * @package App\Command
 */
class TaskTwoCommand extends Command
{

    /**
     * Configuration for command.
     */
    protected function configure()
    {
        $this->setName('random-user')
            ->setDescription('Generate list of random users')
            ->addOption(
                'table',
                'f',
                InputOption::VALUE_NONE,
                'Does this should be printed in a table?'
            );
    }

    /**
     * Command execution.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        /* @var \App\Service\FakeData $nameList */
        $nameList = (new FakeData)->generateData();

        // Provide optional argument for printing table.
        if ($input->getOption('table')) {
            $table = new Table($output);
            $table->setHeaders(['First Name', 'Last Name', 'Address']);

            foreach ($nameList as $record) {
                $table->addRow([$record['firstName'], $record['lastName'], $record['address']]);
            }

            $table->render();
        } else {
            $output->writeln(json_encode($nameList));
        }

    }
}
