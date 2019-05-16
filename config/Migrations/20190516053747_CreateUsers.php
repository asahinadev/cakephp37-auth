<?php
use Migrations\AbstractMigration;
use Migrations\Table;
use Phinx\Db\Table\Column;
use Phinx\Db\Adapter\AdapterInterface;

class CreateUsers extends AbstractMigration {


    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change() {
        $table = parent::table('users');

        $table->addColumn("username", AdapterInterface::PHINX_TYPE_STRING, [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("email", AdapterInterface::PHINX_TYPE_STRING, [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("password", AdapterInterface::PHINX_TYPE_STRING, [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("deleted", AdapterInterface::PHINX_TYPE_BOOLEAN, [
            "null" => false,
            "default" => 0
        ]);

        $table->addColumn("administrator", AdapterInterface::PHINX_TYPE_BOOLEAN, [
            "null" => false,
            "default" => 0
        ]);

        $table->addColumn("office_id", AdapterInterface::PHINX_TYPE_INTEGER, [
            "null" => false,
            "default" => 1
        ]);

        $table->addTimestamps("created", "updated");

        $table->create();
    }


    protected function column($columnName): Column {
        return (new Column())->setName($columnName);
    }
}
