<?php

namespace O2Web\HockeyPlayoffs\Console;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use O2Web\HockeyPlayoffs\Simulator;

class SimulatorCommand extends SymfonyCommand
{
    /**
     * configure.
     * @return void
     */
    public function configure()
    {
        $this->setName('hockey:playoffs')
            ->setDescription('Simulate the playoffs of a hockey league.')
            ->setHelp('This command allows you to simulate the playoffs of a hockey league...');
    }

    /**
     * @param InputInterface  $input  input
     * @param OutputInterface $output output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            '====**** Hockey Playoffs Simulate ****====',
            '==========================================',
            '',
        ]);

        $simulator = new Simulator();
        $simulator->simulate();
        return 1;
    }
}
