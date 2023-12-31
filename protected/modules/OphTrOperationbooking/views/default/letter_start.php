<?php
/**
 * OpenEyes.
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
 * You should have received a copy of the GNU Affero General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @link http://www.openeyes.org.uk
 *
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/agpl-3.0.html The GNU Affero General Public License V3.0
 */
$logo_helper = new LogoHelper();

?>
<header class="print-header">
    <div class="logo">
        <?= $logo_helper->render(); ?>
    </div>
</header>
<div class="flex-layout">
    <div class="to-address">
        <div class="to-address-header">
            To:
        </div>
        <div class="to-address-address">
            <?php echo str_replace("\n", '<br/>', CHtml::encode($toAddress)) ?>
        </div>
    </div>
    <h5 class="right-align">
        <?php
        echo $site->getLetterAddress(array(
            'include_name' => true,
            'delimiter' => '<br />',
            'include_telephone' => true,
            'include_fax' => true,
        )) ?>
        <div class="date"><?php echo date(Helper::NHS_DATE_FORMAT, strtotime($date)) ?></div>
    </h5>
</div>
<br/><br/>
