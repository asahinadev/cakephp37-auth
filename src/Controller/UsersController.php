<?php
namespace App\Controller;

use Cake\Event\Event;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {


    public function beforeFilter(Event $event) {
        $this->Authentication->allowUnauthenticated((array) "login");
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $id = 3;

        $user = $this->Users->get($id, [
            'contain' => [
                'Offices'
            ]
        ]);

        $this->set('user', $user);
    }


    public function login() {
        $request = $this->request;

        $user = $this->Users->newEntity();

        if ($request->is("post")) {

            $user = $this->Users->patchEntity($user, $request->getData(), [
                "validate" => "login"
            ]);

            if ($user->hasErrors()) {
                $this->Flash->error(__("InputError"));
            } else {
                // Using Authentication component
                $result = $this->Authentication->getResult();

                // Using request object
                $result = $request->getAttribute('authentication')
                    ->getResult();

                if ($result->isValid()) {
                    $user = $request->getAttribute('identity');
                    $this->log("login : " . print_r($user, true), "debug");

                    return $this->redirect("/");
                } else {
                    $this->log($result->getStatus());
                    $this->log($result->getErrors());
                }
            }
        }
        $this->set(compact("user"));
    }
}