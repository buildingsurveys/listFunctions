<?php

/**
 * This file is part of listFunctions plugin
 * @version 1.0
 */

namespace listFunctions;

use Yii;
use LimeExpressionManager;
use Survey;
use SurveyDynamic;
use CDbCriteria;
use Permission;

class listFunctionHelper
{
    /**
     * Retrieves an element from a comma-separated string at a specific index.
     *
     * @param string $csvString The comma-separated string to extract the element from.
     * @param int $index The index of the element to retrieve. Array indices start at 0.
     * @return mixed Returns the element at the specified index if it exists, otherwise returns null.
     */
    public static function elemAtPos($csvString, $index) {
       $array = explode(',', $csvString);
       if (!isset($array[$index])) {
           return null;
       }
       return $array[$index];
    }
}
