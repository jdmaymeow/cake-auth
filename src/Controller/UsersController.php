<?php
namespace CakeAuth\Controller;

use Cake\Event\Event;
use CakeAuth\Controller\AppController;

/**
 * Users Controller
 *
 * @property \CakeAuth\Model\Table\UsersTable $Users
 */
class UsersController extends AbstractUsersController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
