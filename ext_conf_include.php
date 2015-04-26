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
    
if (!defined ('TYPO3_MODE')) {
	die('Access denied.');
}

// Register Caretaker Services
if (t3lib_extMgm::isLoaded('caretaker') &&  t3lib_extMgm::isLoaded('caretaker_instance')){
	include_once(t3lib_extMgm::extPath('caretaker_instance') . 'classes/class.tx_caretakerinstance_ServiceHelper.php');
	tx_caretakerinstance_ServiceHelper::registerCaretakerTestService($_EXTKEY, 'services', 'tx_caretakeraddservices_clearTYPO3CacheViaCoreApi', 'TYPO3 -> Clear cache', 'clears the cache via coreapi');
}
