<?php
/**
 * (C) OpenEyes Foundation, 2014
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
 * You should have received a copy of the GNU Affero General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @link http://www.openeyes.org.uk
 *
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (C) 2014, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/agpl-3.0.html The GNU Affero General Public License V3.0
 */

/**
 * Functionality for selecting items from a lookup table.
 */
class SelectionHelper
{
    /**
     * Get list data for the specified model class in the same format as CHtml::listData.
     *
     * @param string $class
     * @param scalar $value
     *
     * @return array
     */
    public static function listData($class, $value = null)
    {
        $lookup = $class::model();

        if ($lookup->asa('LookupTable')) {
            $lookup->activeOrPk($value);
        }

        return CHtml::listData(
            $lookup->cache(60)->with($lookup::SELECTION_WITH)->findAll(array('order' => $lookup::SELECTION_ORDER)),
            'id',
            method_exists($lookup, 'getSelectionLabel') ? 'selectionLabel' : $lookup::SELECTION_LABEL_FIELD
        );
    }
}
