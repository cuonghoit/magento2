<?php
namespace Magetop\Helloworld\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable('hello_world');
        if($setup->getConnection()->isTableExists($tableName) == true){
            $data = [
                [
                    'name' => 'Cuong 1',

                ],
                [
                    'name' => 'Cuong 2',

                ],

            ];
            foreach ($data as $item){
                $setup->getConnection()->insert($tableName, $item);
            }
        }
        $setup->endSetup();
    }
}
