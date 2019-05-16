<?php
use Migrations\AbstractMigration;

class FkUsersOfficeId extends AbstractMigration {


    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change() {
        $users = parent::table('users');
        $users->addForeignKeyWithName("fk_users_office_id", "office_id", 'offices');
        $users->save();
    }
}
