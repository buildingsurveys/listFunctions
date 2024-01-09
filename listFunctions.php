<?php

/**
 * @author Gabriel Jenik <gabriel@encuesta.biz>
 * @copyright 2023 Gabriel Jenik
 * @license GPL version 3
 * @version 0.1.0
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
class listFunctions extends PluginBase
{
    protected static $description = 'Add functions in ExpressionScript Engine to handle lists.';
    protected static $name = 'listFunctions';

    /** @inheritdoc, this plugin didn't have any public method */
    public $allowedPublicMethods = array();

    public function init()
    {
        $this->subscribe('ExpressionManagerStart', 'newValidFunctions');
    }

    public function newValidFunctions()
    {
        Yii::setPathOfAlias(get_class($this), dirname(__FILE__));
        $newFunctions = array(
            'elemAtPos' => array(
                '\listFunctions\listFunctionHelper::elemAtPos',
                null, // No javascript function : set as static function
                $this->gT("Picks the element at a given index from a list (string, comma separated value, the one returned by list function). Returns null if the element doesn't exist"), // Description for admin
                'string elemAtpos(string, index)', // Extra description
                '', // Help url
                2, // Number of argument
            ),
        );
        $this->getEvent()->append('functions', $newFunctions);
    }
}
