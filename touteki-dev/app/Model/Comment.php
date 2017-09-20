<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP Comment
 * @author
 */
class Comment extends AppModel {

    public $belongsTo = array('Customer','Item');

    public $validate = [
        'customer_id' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],
        'item_id' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],
        'comment' => [
            'required' => [
                'rule' => 'notBlank',
                'message' => '入力必須です',
            ],
        ],
    ];


    /**
     * Commentテーブル一覧を取得
     * @return array $comments
     */
    public function getCommentList() {

        $recursive = 0;

        $fields = [
            'Comment.id',
            'Comment.customer_id',
            'Comment.item_id',
            'Comment.comment',
            'Comment.created',
            'Comment.modified',
            'Customer.id',
            'Customer.first_name',
            'Customer.last_name',
            'Item.id',
            'Item.item_category',
            'Item.item_name',
        ];

        $conditions = [
            'Comment.delete_flg' => 0,
        ];

        $order = [
            'Comment.id DESC'
        ];
        return $this->find('all', compact('recursive', 'fields', 'conditions','order'));
    }
}
