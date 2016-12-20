<?php

namespace BlogBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class LoadCommand
 *
 * This class is used in order to load data into database from PHP arrays
 *
 * @package BlogBundle\Command
 */
class LoadCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('load')
            ->addArgument(
                'task',
                InputArgument::OPTIONAL
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $task = $input->getArgument('task');

        if ($task) {
            $task = 'load' . $task;
            $this->getContainer()->get('model.maintenance')->$task();
        } else {
            $output->writeln('Task is not defined');
        }
    }
}
