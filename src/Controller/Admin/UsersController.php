<?php
namespace CakeAuth\Controller\Admin;

use Cake\Event\Event;
use CakeAuth\Controller\AbstractUsersController;
use CakeAuth\Controller\AppController;
use MayMeow\Helpers\TwoStepAuth;
use MayMeow\Helpers\TwoStepAuthInterface;

/**
 * Users Controller
 *
 * @property \CakeAuth\Model\Table\UsersTable $Users
 */
class UsersController extends AbstractUsersController
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('CakeFile.Uploader', [
            'upload_domain' => 'users',
            'upload_dir' => 'images',
            'allowed' => ['png', 'jpg', 'jpeg', 'gif']
        ]);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub
        $this->Auth->deny();
    }

    public function updateImage($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->image = $this->Uploader->upload($user->image_file);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The node has been saved.'));
                return $this->redirect(['action' => 'view', $id]);
            }
        }
    }

    public function activateTwoFa($id = null)
    {
        $user = $this->Users->get($id);
        $secretFactory = new TwoStepAuth();
        $secret = $secretFactory->createSecret()->key();
        $secretReadable = $secretFactory->readableKey();

        if($this->request->is(['patch', 'post', 'put'])) {
            // inf secret is not verified return values back to form for validation
            if (!$secretFactory->verifyCode($this->request->data('two_fa_secret'), $this->request->data('pin'))) {
                $secret = $this->request->data('two_fa_secret');
                $secretReadable = $secretFactory->readableKey($secret);
            } else {
                // else save it to user
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('2FA was activated'));
                    return $this->redirect(['action' => 'view', $id]);
                }
            }
        }

        $this->set('secret', $secret);
        $this->set(compact('user', 'secretReadable'));
        $this->set('_serialize', ['user']);
    }

    public function deactivateTwoFa($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user->two_fa_secret = null;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('2FA was deactivated'));
            }
        }

        return $this->redirect(['action' => 'view', $id]);
    }
}
