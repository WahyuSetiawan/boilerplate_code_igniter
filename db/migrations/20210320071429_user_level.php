<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UserLevel extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table("user_level", ["id" => false, "primary_key" => ["user_level_id"]]);
        $table->addColumn("user_level_id", "integer", ["limit" => 11, "null" => false, 'identity' => true,])
            ->addColumn("name", "string", ["limit" => 30, "null" => false])
            ->addColumn("parent_user_level", "integer", ["limit" => 11, "null" => false, "default" => 0])
            ->create();
    }

    public function up()
    {
        
    }
}
