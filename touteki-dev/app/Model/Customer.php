<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP Customer
 * @author
 */
class Customer extends AppModel {
    public function beforeSave($options = array()) {
        if(!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher(['hashType' => 'sha256']);
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}
