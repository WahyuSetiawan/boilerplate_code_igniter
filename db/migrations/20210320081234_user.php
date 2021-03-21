<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class User extends AbstractMigration
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
        $table = $this->table("user", ["id" => false, "primary_key" => ["user_id"]]);

        $table->addColumn("user_id", "integer", ["limit" => 11, "null" => false, "identity" => true])
            ->addColumn("name", "string", ["limit" => 11, "null" => false])
            ->addColumn("user_level_id", "integer", ["limit" => 11, "null" => true])
            ->addForeignKey("user_level_id", "user_level", "user_level_id", ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
            ->create();
    }

    public function up(): void
    {
    }
}
