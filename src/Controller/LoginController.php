<?php
namespace App\Controller;

/**
 * Login Controller
 *
 */
class LoginController extends AppController {


    /**
     * Login method
     *
     * @return \Cake\Http\Response|null
     */
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid credentials, try again'));
        }
    }
}
