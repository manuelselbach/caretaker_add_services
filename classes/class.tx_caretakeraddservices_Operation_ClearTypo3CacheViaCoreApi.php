<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2009-2011 by Manuel Selbach
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

require_once(t3lib_extMgm::extPath('caretaker_instance', 'classes/class.tx_caretakerinstance_OperationResult.php'));

/**
 * A Operation which will clear the cache by the given level
 */
class tx_caretakeraddservices_Operation_ClearTypo3CacheViaCoreApi implements tx_caretakerinstance_IOperation
{

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager
     * @inject
     */
    protected $objectManager;

    /**
     * @param array $parameter None
     * @return the status
     */
    public function execute($parameter = array())
    {
        // build up coreapi service
        $this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $coreApiCacheService = $this->objectManager->get("Etobi\\CoreAPI\\Service\\CacheApiService");
        $coreApiCacheService->initializeObject();

        // clear cache be cache level
        $success = false;
        switch ((int)$parameter['cacheLevel']) {
            // Frontend
            case 0:
                $coreApiCacheService->clearPageCache();
                $success = 'Frontend';
                break;

            // General
            case 1:
                $coreApiCacheService->clearConfigurationCache();
                $success = 'General';
                break;

            // System
            case 2:
                $coreApiCacheService->clearSystemCache();
                $success = 'System';
                break;
        }

        return new tx_caretakerinstance_OperationResult(true, $success);
    }
}
