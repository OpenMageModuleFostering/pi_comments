<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getTable('comments/customer_commentss');

$tableDdlObj = $installer->getConnection()
        ->newTable($table)
        ->addColumn("id", Varien_Db_Ddl_Table::TYPE_INTEGER, NULL, array(
            'identity' => true,
            'nullable' => false,
            'primary' => true,
            'unsigned' => true,
                ), 'Id')
          
        ->addColumn("customer_email", Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
                ), 'Customer Email')
        ->addColumn("customer_name", Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
                ), 'Customer Name')
        ->addColumn("comments", Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
                ), 'Comments')
        ->addColumn("picture", Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
                ), 'Picture')
        ->addColumn("status", Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
                ), 'status')
        
        ->setComment("customer status");
        

$installer->getConnection()->createTable($tableDdlObj);


$installer->endSetup();
