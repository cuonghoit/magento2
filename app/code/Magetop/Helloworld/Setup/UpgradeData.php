<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magetop\Helloworld\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Upgrade Data script
 */

class UpgradeData implements UpgradeDataInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if ($context->getVersion()
            && version_compare($context->getVersion(), '1.0.3') < 0
        ) {
            $table = $setup->getTable('hello_world');
            $setup->getConnection()
                ->insertForce($table, ['name' => 'Cuong3', 'title' => 'ho bien cuong 3']);

            $setup->getConnection()
                ->update($table, ['title' => 'ho bien cuong'], 'id IN (1,2)');
        }
        $setup->endSetup();
    }
}
