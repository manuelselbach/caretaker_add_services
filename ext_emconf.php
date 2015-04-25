<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "caretaker_add_services"
 *
 * Auto generated by Extension Builder 2015-04-23
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'caretaker additional services',
	'description' => '',
	'category' => 'be',
	'author' => 'Manuel Selbach',
	'author_email' => 'manuel_selbach@yahoo.de',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2',
			'caretaker_instance' => '0.5.*',
            'coreapi' => '1.*'
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);