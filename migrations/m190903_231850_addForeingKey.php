<?php

use yii\db\Migration;

/**
 * Class m190903_231850_addForeingKey
 */
class m190903_231850_addForeingKey extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190903_231850_addForeingKey cannot be reverted.\n";

        return false;
    }

    public function Up()
    {
        $this->addForeignKey(
            'usersgames_FK',
            'usersgames',
            'id_pitBoss',
            'pit_bosses',
            'id'
        );
    }

    public function Down()
    {
        $this->dropForeignKey(
            'usersgames_FK',
            'usersgames'
        );
    }
}
