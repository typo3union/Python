<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Voucher',
	array(
		//'Voucher' => 'list, show, new, create, edit, update',
		//'VoucherCustomer' => 'list, show, new, create',
		//'VoucherOrder' => 'list, show, new, create',
		'Voucher' => 'list, show',
	),
	// non-cacheable actions
	array(
			
	)
);

?>