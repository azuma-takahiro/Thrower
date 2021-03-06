<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher','Controller/Component/Auth');

/**
 * CakePHP User
 * @author
 */
class User extends AppModel {

    public $validate = [
        'username' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
            'duplication' => [
                'rule' => 'isUnique',
                'message' => 'すでに登録のあるusernameです'
            ]
        ],
        'password' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],
    ];

    /**
     * Userテーブル一覧を取得
     * @return array $users
     */
    public function getUserList() {

        $recursive = 0;

        $fields = [
            'User.id',
            'User.username',
            'User.password',
            'User.role',
            'User.created',
            'User.modified',
        ];

        // $conditions = [
        //     'User.delete_flg' => 0,
        // ];

        // $order = [
        //     'User.id DESC'
        // ];

        return $this->paginate('User', compact('recursive', 'fields', 'conditions','order'));
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
