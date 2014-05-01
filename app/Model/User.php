<?php
App::uses('RoutineModel', 'Routine.Model');

class User extends RoutineModel {

    public $validate = [
        'username' => ['required', 'notempty', 'unique'],
        'email' => ['required', 'notempty', 'fuzzy_email', 'unique'],
        'password' => ['required', 'notempty'],
        'password_confirm' => ['required', 'notempty', 'password_confirm'],
    ];

    public $validationSets = [
        'add' => [
            'id' => ['ignore'],
            'username' => ['required', 'notempty', 'unique'],
            'email' => ['required', 'notempty', 'fuzzy_email', 'unique'],
            'password' => ['required', 'notempty'],
            'password_confirm' => ['required', 'notempty', 'password_confirm'],
        ],
        'edit' => [
            'id' => ['required', 'notempty'],
            'username' => ['required', 'notempty', 'unique'],
            'email' => ['required', 'notempty', 'fuzzy_email', 'unique'],
            'password' => ['notempty'],
            'password_confirm' => ['notempty', 'password_confirm'],
        ],
    ];

    public function add($data = null) {
        if (!empty($data)) {
            $this->create();
            $this->setValidation('add');
            $this->set($data);
            $result = $this->validates();
            if ($result === false) {
                throw new ValidationException();
            }
            $this->data['User']['password'] = Security::hash($this->data['User']['password'], null, true);
            $this->data['User']['password_confirm'] = Security::hash($this->data['User']['password_confirm'], null, true);
            $this->data['User']['delete_flg'] = false;
            $result = $this->save();
            if ($result !== false) {
                $this->data = array_merge($data, $result);
                return true;
            } else {
                throw new OutOfBoundsException(__('Could not save, please check your inputs.', true));
            }
        }
    }

    public function edit($id = null, $data = null, $conditions = []) {
        $conditions['User.id'] = $id;
        $user = $this->find('first', [
            'conditions' => $conditions
        ]);

        if (empty($user)) {
            throw new OutOfBoundsException(__('Invalid Access', true));
        }

        if (!empty($data)) {
            $this->set($data);

            if ( empty($this->data['User']['update_password_flg']) ) {
                unset($this->data['User']['password']);
                unset($this->data['User']['password_confirm']);
            } else {
                if ( !empty($this->data['User']['password']) ) {
                    $this->data['User']['password'] = Security::hash($this->data['User']['password'], null, true);
                }
                if ( !empty($this->data['User']['password_confirm']) ) {
                    $this->data['User']['password_confirm'] = Security::hash($this->data['User']['password_confirm'], null, true);
                }
            }

            $this->setValidation('edit');

            $result = $this->save(null, true);
            if ($result) {
                $this->data = $result;
                return true;
            } else {
                throw new ValidationException();
            }
        } else {
            unset($user['User']['password']);
            return $user;
        }
    }

}
