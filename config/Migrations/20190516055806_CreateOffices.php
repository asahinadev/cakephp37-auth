<?php
use Migrations\AbstractMigration;
use Phinx\Db\Adapter\AdapterInterface;

class CreateOffices extends AbstractMigration {


    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change() {
        $table = parent::table('offices');

        $table->addColumn("name", AdapterInterface::PHINX_TYPE_STRING, [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("code", AdapterInterface::PHINX_TYPE_STRING, [
            "limit" => 255,
            "null" => false
        ]);

        $table->addColumn("email", AdapterInterface::PHINX_TYPE_STRING, [
            "limit" => 255,
            "null" => true
        ]);

        $table->addColumn("deleted", AdapterInterface::PHINX_TYPE_BOOLEAN, [
            "null" => false,
            "default" => 0
        ]);

        $table->addColumn("rank", AdapterInterface::PHINX_TYPE_INTEGER, [
            "null" => false,
            "default" => 1
        ]);

        $table->addTimestamps("created", "updated");

        $table->create();
    }
}
