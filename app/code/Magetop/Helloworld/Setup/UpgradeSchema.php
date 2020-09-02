<?php
namespace Magetop\Helloworld\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;


class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable('hello_world');
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            if ($setup->getConnection()->isTableExists($tableName) != true){
                $table = $setup->getConnection()->newTable($tableName)
                    ->addColumn(
                        'id',
                        Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'unsigned' => true,
                            'nullable' => false,
                            'primary' => true
                        ],
                        'ID'
                    )
                    ->addColumn(
                        'name',
                        Table::TYPE_TEXT,
                        null,
                        ['nullable' => false, 'default' => ''],
                        'name'
                    )

                    ->setComment('Magetop Hello')
                    ->setOption('type', 'InnoDB')
                    ->setOption('charset', 'utf8');
                $setup->getConnection()->createTable($table);
            }
        }
        // Thêm cột vào bảng
        if(version_compare($context->getVersion(),'1.0.1','<')){
            if ($setup->getConnection()->isTableExists($tableName) == true){
                $column = [
                    'title' => [
                        'type' => Table::TYPE_TEXT,
                        ['nullable' => true, 'default' => ''],
                        'comment' => 'title',
                    ],
                ];
                foreach ($column as $name => $definition){
                    $setup->getConnection()->addColumn($tableName, $name, $definition);
                }
            }
        }

        $setup->endSetup();
    }
}
