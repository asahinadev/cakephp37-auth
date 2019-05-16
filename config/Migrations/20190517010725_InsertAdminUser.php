<?php
use Migrations\AbstractMigration;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\I18n\FrozenTime;

class InsertAdminUser extends AbstractMigration {


    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change() {
        $hasher = new DefaultPasswordHasher();

        $now = FrozenTime::now()->i18nFormat("yyyy-MM-dd HH:mm:ss.SSS");
        $pass = $hasher->hash("password");

        $table = parent::table('offices');
        $table->insert([
            [
                'name' => "undefined",
                'code' => "000",
                'created' => $now,
                'updated' => $now
            ]
        ]);
        $table->saveData();

        $table = parent::table('users');

        $table->insert(
            [
                [
                    'username' => "system",
                    'email' => "system@localhost",
                    'password' => $pass,
                    'administrator' => 1,
                    'created' => $now,
                    'updated' => $now
                ],
                [
                    'username' => "user",
                    'email' => "user@localhost",
                    'password' => $pass,
                    'created' => $now,
                    'updated' => $now
                ]
            ]);

        $table->saveData();
    }
}
