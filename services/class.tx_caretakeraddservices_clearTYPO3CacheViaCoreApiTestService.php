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

require_once(t3lib_extMgm::extPath('caretaker_instance', 'services/class.tx_caretakerinstance_RemoteTestServiceBase.php'));

/**
 * Clear Cache via corapi services
 */
class tx_caretakeraddservices_clearTYPO3CacheViaCoreApiTestService extends tx_caretakerinstance_RemoteTestServiceBase
{

    public function runTest()
    {
        $cacheLevel = $this->getConfigValue('clear_cache');

        // execute the remote command
        $operation = array('ClearTypo3CacheViaCoreApi', array('cacheLevel' => $cacheLevel));
        $operations = array($operation);

        $commandResult = $this->executeRemoteOperations($operations);

        if (!$this->isCommandResultSuccessful($commandResult)) {
            return $this->getFailedCommandResultTestResult($commandResult);
        }

        $results = $commandResult->getOperationResults();
        $operationResult = $results[0];
        if ($operationResult->isSuccessful()) {
            $response = $operationResult->getValue();
        } else {
            return $this->getFailedOperationResultTestResult($operationResult);
        }

        // check response
        if ($response != false) {
            $message = 'The following cache has been successfully cleared: ' . $response;
            $testResult = tx_caretaker_TestResult::create(tx_caretaker_Constants::state_ok, 0, $message);

        } else {
            $message = 'ERROR: cache was not cleared!';
            $testResult = tx_caretaker_TestResult::create(tx_caretaker_Constants::state_error, 0, $message);
        }

        return $testResult;
    }
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/caretakeraddservices/services/class.tx_caretakeraddservices_clearTYPO3CacheViaCoreApiTestService.php']) {
    include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/caretakeraddservices/services/class.tx_caretakeraddservices_clearTYPO3CacheViaCoreApiTestService.php']);
}
