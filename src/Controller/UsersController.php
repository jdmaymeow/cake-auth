<?php
namespace CakeAuth\Controller;

use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Routing\Router;
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
        $this->Auth->allow(['add', 'logout', 'forgottenPassword', 'newPassword']);
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

    public function forgottenPassword()
    {
        $user = $this->Users->newEntity();

        if($this->request->is('post')) {
            $passResetUser = $this->Users
                ->findByEmail($this->request->data['email'])
                ->select(['id','password_reset'])->first();

            if($passResetUser) {
                $passResetUser->password_reset = md5($passResetUser->id . date('YmdH'));
                $this->Users->save($passResetUser);

                $url = Router::url([
                    '_full' => true,
                    'controller' => 'users',
                    'plugin' => 'CakeAuth',
                    'action' => 'newPassword',
                    $passResetUser->password_reset
                ]);

                //add following lines to send string via email
                $message = 'Hi. You or someone else was requested for password reset. Your reset string is: ' . $passResetUser->password_reset . ' Navigate to ' . $url;

                $email = new Email();
                $email->to($this->request->data['email'])
                    ->subject('Password reset')
                    ->send($message);

                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function newPassword($resetID = null)
    {
        $user = $this->Users
            ->find()
            ->where(['password_reset LIKE' => $resetID])
            ->select(['id', 'password', 'password_reset'])->first();

        //Default dissalow user to change passord and hide form
        $allowPasswordChange = $user ? true : false;

        // when we post data update user remove password reset string and save
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->password_reset = '';
            if ($this->Users->save($user)) {
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('allowPasswordChange', 'user'));
        $this->set('_serialize', ['allowPasswordChange', 'user']);
    }
}
