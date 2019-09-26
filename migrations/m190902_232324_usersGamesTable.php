<?php

use yii\db\Migration;

/**
 * Class m190902_232324_usersGamesTable
 */
class m190902_232324_usersGamesTable extends Migration
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
        echo "m190902_232324_usersGamesTable cannot be reverted.\n";

        return false;
    }

    public function Up()
    {
        $this->createTable(
            'usersGames',
            [
                'id_game' => $this->primaryKey(),
                'id_pitBoss' => $this->tinyInteger(2)->notNull(),
                'id_player' => $this->integer(5)->notNull(),
                'points' => $this->integer(3)->notNull(),
                'summa_zala' => $this->integer(3)->notNull()->defaultValue(0),
                'date' => $this->date(),
            ]
        );
    }

    public function Down()
    {
        $this->dropTable('usersGames');
    }
}
