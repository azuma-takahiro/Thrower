<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher','Controller/Component/Auth');

/**
 * CakePHP Customer
 * @author
 */
class Customer extends AppModel {
    public $hasMany = array('Order','Inquiry','Comment');

    public $validate = [
        'last_name' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],
        'first_name' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],
        'last_name_kana' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],
        'first_name_kana' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],
        'email' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],
        'password' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],
        'postal_code' => [
            'required' => [
                'rule' => array('notBlank','postal'),
                'message' => '入力必須です',
            ],
        ],
        'address1' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],
        'phone_number' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],

    ];

    public function getCustomerList() {

        $recursive = 0;

        $conditions = [
            'Customer.delete_flg' => 0,
        ];

        $order = [
            'Customer.id DESC'
        ];

        return $this->find('all', compact('recursive', 'conditions','order'));
    }

        public function beforeSave($options = array()) {
        if(!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

}
