<?php
return array(
	'table' => array(
		'mshop_product' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

			// $table = $schema->createTable( 'mshop_price' );
			$table = $schema->getTable( 'mshop_product' );

			$table->addColumn( 'oldcode', 'string', array( 'length' => 32 ) );

			//$table->addIndex( array( 'siteid', 'oldcode' ), 'idx_msproty_sid_oldcode' );

			return $schema;
		}
	)
);