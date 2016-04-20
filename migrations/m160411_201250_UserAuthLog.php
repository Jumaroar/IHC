<?php

use yii\db\Migration;

class m160411_201250_UserAuthLog extends Migration
{
    public function up()
    {
		
		$this->createTable('UserAuthLog', [
			 'id' => $this->primaryKey(),
			 'userId' => $this->integer(),
			 'date' => $this->timestamp(),
			 'cookieBased' => $this->boolean(),
			 'duration' => $this->integer(),
			 'error' => $this->string(),
			 'ip' => $this->string(),
			 'host' => $this->string(),
			 'url' => $this->string(),
			 'userAgent' => $this->string(),]);
		
    }

    public function down()
    {
        echo "m160411_201250_UserAuthLog cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
