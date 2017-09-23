<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP Customer
 * @author
 */
class Customer extends AppModel {

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
                'rule' => 'notBlank',
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

}
