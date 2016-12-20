<?php

namespace BlogBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SetRoleToGroupCommand
 *
 * This class is used in order to set some role to some group from command line
 *
 * @package BlogBundle\Command
 */
class SetRoleToGroupCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('setrg')
            ->addArgument(
                'role_id',
                InputArgument::REQUIRED
            )->addArgument(
                'group_id',
                InputArgument::REQUIRED
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $group_id = $input->getArgument('group_id');
        $role_id = $input->getArgument('role_id');

        if (!(empty($group_id) || empty($role_id))) {
            try {
                $this->getContainer()->get('model.maintenance')->setRoleToGroup($role_id, $group_id);
            } catch (\Exception $e) {
                $output->writeln($e->getMessage());
            }
        } else {
            $output->writeln('Not all arguments are defined');
        }
    }
}
