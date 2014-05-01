<?php
App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public $uses = [
        'User',
    ];

    /**
     * beforeFilter
     *
     */
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow([
            'login',
            'setup',
        ]);
        $this->User->hasAll();
    }

    /**
     * index
     *
     */
    public function index(){
        $this->Routine->index();
    }

    /**
     * view
     *
     */
    public function view($id = null){
        $this->Routine->view($id);
    }

    /**
     * add
     *
     */
    public function add() {
        $this->Routine->add();
    }

    /**
     * edit
     *
     */
    public function edit($id = null) {
        $this->Routine->edit($id);
    }

    /**
     * delete
     *
     */
    public function delete($id = null){
        $this->Routine->delete($id);
    }

    /**
     * login
     *
     */
    public function login(){
        if ($this->User->find('count') === 0) {
            $this->redirect(array('action' => 'setup'));
        }

        if (AuthComponent::user('id')) {
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            } else {
                $this->Session->setFlash(
                    __('Username or password is incorrect'),
                    $this->setFlashElement['error'],
                    $this->setFlashParams['error'],
                    'auth');
            }
        }
        $this->set('title_for_layout', __('Sign In'));
    }

    /**
     * logout
     *
     */
    public function logout(){
        $this->Routine->logout();
    }

    /**
     * setup
     *
     */
    public function setup(){
        $this->Routine->add();
        if ($this->User->find('count') > 0) {
            $this->redirect('/');
        }
    }
}
