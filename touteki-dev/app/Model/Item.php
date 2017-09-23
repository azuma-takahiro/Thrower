<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP Item
 * @author
 */
class Item extends AppModel {

    public $hasMany = array('Comment','OrderDetail');

    public $validate = [
        // urlのみ許可
        'picture_url' => [
            'string' => [
                'vaidate1' => [
                    'rule' => ['url', true],
                ],
            ],
        ],
    ];

 /**
     * Itemテーブル一覧を取得
     * @return array $users
     */
    public function getItemList() {

        $recursive = 0;

        $fields = [
            'Item.id',
            'Item.item_name',
            'Item.item_category',
            'Item.maker_id',
            'Item.description',
            'Item.price',
            'Item.picture_url',
            'Item.created',
            'Item.modified',
            'Item.delete_flg',
        ];

        $conditions = [
            'Item.delete_flg' => 0,
        ];

        $order = [
            'Item.id DESC'
        ];

        return $this->find('all', compact('recursive', 'fields', 'conditions','order'));
    }
}
