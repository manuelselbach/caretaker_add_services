<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2009-2015 by Manuel Selbach
 *
 * All rights reserved
 *
 * This script is part of the Caretaker project. The Caretaker project
 * is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

// Register default caretaker Operations
$operations = array(
    'ClearTypo3CacheViaCoreApi',
);
foreach ($operations as $operationKey) {
    $TYPO3_CONF_VARS['EXTCONF']['caretaker_instance']['operations'][$operationKey] =
        'EXT:caretaker_add_services/classes/class.tx_caretakeraddservices_Operation_' . $operationKey . '.php:&tx_caretakeraddservices_Operation_' . $operationKey;
}

require(t3lib_extMgm::extPath('caretaker_add_services') . '/ext_conf_include.php');

