<?php

namespace App\Command;


use App\Service\FakeData;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ListCommand extends Command
{

    protected function configure()
    {
        $this->setName('app:random-user')
            ->setDescription('Generate list of random users')
            ->addOption(
                'table',
                'f',
                InputOption::VALUE_NONE,
                'Does this should be printed in a table?'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $nameList = (new FakeData)->generateData();

        //optional argument
        $table = $input->getOption('table');

        if($table) {
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
