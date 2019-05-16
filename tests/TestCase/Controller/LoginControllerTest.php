<?php
namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;


/**
 * App\Controller\LoginController Test Case
 */
class LoginControllerTest extends TestCase {
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Login'
    ];


    /**
     * Test login method
     *
     * @return void
     */
    public function testLogin() {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
