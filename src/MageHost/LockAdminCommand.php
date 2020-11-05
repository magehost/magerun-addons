<?php

namespace MageHost;

use N98\Magento\Command\AbstractMagentoCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LockAdminCommand extends AbstractMagentoCommand
{

    protected function configure()
    {
        $this
            ->setName('magehost:admin:lock')
            ->setDescription(
                'Lock all admin users that aren\'t locked yet.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->detectMagento($output, true);
        if (!$this->initMagento()) {
            return;
        }

        $collection = \Mage::getModel('admin/user')->getCollection();
        $collection->addFieldToFilter('main_table.is_active', true);
        $users = $collection->getItems();

        $lockedUsers = [];

        foreach ($users as $user) {
            $user->setIsActive(false);
            array_push($lockedUsers, $user->getId());
            $user->save();
        }

        if (count($lockedUsers) == 0) {
            return $output->writeln('<error>No unlocked users found!</error>');
        }

        file_put_contents($_SERVER['HOME'] . '/.locked_admin_users', implode(',', $lockedUsers));

        return $output->writeln('<info>Admin is locked!</info>');
    }
}
