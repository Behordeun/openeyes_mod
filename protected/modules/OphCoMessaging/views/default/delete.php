<?php
/**
 * OpenEyes.
 *
 * (C) OpenEyes Foundation, 2019
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.
 * You should have received a copy of the GNU Affero General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @link http://www.openeyes.org.uk
 *
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2019, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/agpl-3.0.html The GNU Affero General Public License V3.0
 */
?>

<?php
$this->beginContent('//patient/event_container', array('no_face' => true)); ?>

<?= CHtml::form(array('Default/delete/' . $this->event->id), 'post', array('id' => 'deleteForm')); ?>
    <div id="delete_event">

        <h3>Delete event</h3>
        <div class="alert-box alert with-icon">
            <strong>WARNING: This will permanently delete the event and remove it from view.<br><br>THIS ACTION CANNOT
                BE UNDONE.</strong>
        </div>
        <?php $this->displayErrors(@$errors) ?>
        <div style="width:300px; margin-bottom: 0.6em;">
            <p>Reason for deletion:</p>
            <?=\CHtml::textArea('delete_reason', '') ?>
        </div>
        <p>
            <strong>Are you sure you want to proceed?</strong>
        </p>
        <?= CHtml::hiddenField('event_id', $this->event->id); ?>

        <button type="submit" class="warning" id="et_deleteevent" name="et_deleteevent">

            Delete event
        </button>
        <button type="submit" class="button small green" id="et_canceldelete" name="et_canceldelete">
            Cancel
        </button>
        <img class="loader" src="<?php echo Yii::app()->assetManager->createUrl('img/ajax-loader.gif') ?>"
             alt="loading..." style="display: none;"/>
        <?=\CHtml::endForm() ?>
    </div>

<?php $this->endContent() ?>