<?php

class m190513_113735_change_CCT_element_type_to_the_right_element_group extends CDbMigration
{
    public function up()
    {
        $examination_event_type = $this->dbConnection->createCommand('SELECT id FROM event_type WHERE name = "Examination"')
            ->queryScalar();
        $antseg_function_element_group = $this->dbConnection
            ->createCommand('SELECT id FROM element_group WHERE name = :name AND event_type_id = :event_type')
            ->bindValues(array(':name' => 'Anterior Segment', 'event_type' => $examination_event_type))
            ->queryScalar();
        $this->update(
            'element_type',
            ['element_group_id' => $antseg_function_element_group],
            'class_name = :class_name',
            [':class_name' => 'OEModule\OphCiExamination\models\Element_OphCiExamination_AnteriorSegment_CCT']
        );
    }

    public function down()
    {
        echo "m190513_113735_change_CCT_element_type_to_the_right_element_group does not support migration down.\n";
        return false;
    }
}
