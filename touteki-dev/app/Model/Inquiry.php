<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP Inquiry
 * @author
 */
class Inquiry extends AppModel {
    public $belongsTo = array('Customer');


    public function getInquiryList() {
        $recursive = 0;

        $fields = [
            'Inquiry.id',
            'Inquiry.inquiry_category',
            'Inquiry.content',
            'Inquiry.created',
            'Inquiry.modified',
            'Customer.id',
            'Customer.first_name',
            'Customer.last_name',
        ];

        $conditions = [
            'Inquiry.delete_flg' => 0,
        ];

        $order = [
            'Inquiry.id DESC'
        ];

        return $this->find('all',compact('recursive', 'fields', 'conditions', 'order'));
    }
}
