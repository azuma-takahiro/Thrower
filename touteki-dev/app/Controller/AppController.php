<?php

App::uses('Controller', 'Controller');

/**
 * 全体共通処理のみ記述
 * $components,$helpers,$usesの定義は不可
 */
class AppController extends Controller {
    public $components = [
        'DebugKit.Toolbar',
        'Session',
        'Flash',
        'Auth' => [
            'loginAction' => [
                'controller' => 'AdminUsers',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'AdminUsers',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'AdminUsers',
                'action' => 'login'
            ],
            'authError' => [
                'ログインしてください。'
            ],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'User',
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password'
                    ],
                    'passwordHasher' => array(
                        'className' => 'Simple',
                    'hashType' => 'sha1'
                    )
                ]
            ]
        ]
    ];

    public $helpers = [
        'Session',
        'Html' => ['className' => 'TwitterBootstrap.BootstrapHtml'],
        'Form' => ['className' => 'TwitterBootstrap.BootstrapForm'],
        'Paginator' => ['className' => 'TwitterBootstrap.BootstrapPaginator'],
     ];

    public function beforeFilter() {
        // debug($this->request->params);exit;
        if($this->request->params['controller'] == 'Customers' || $this->request->params['controller'] == 'orders'|| $this->request->params['controller'] == 'Orders') {
            $this->layout = "general";
            $this->Auth->authenticate = [
                'Form' => [
                    'userModel' => 'Customer',
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    'passwordHasher' => array(
                        'className' => 'Simple',
                    'hashType' => 'sha1'
                    )
                ]
            ];

            $this->Auth->loginAction = [
                'controller' => 'customers',
                'action' => 'signin',
                // 'admin' => true
            ];
            $this->Auth->loginRedirect = [
                'controller' => 'items',
                'action' => 'top',
                // 'admin' => true
            ];
            $this->Auth->logoutRedirect = [
                'controller' => 'Customers',
                'action' => 'signin',
                // 'admin' => true
            ];
            AuthComponent::$sessionKey = "Auth.Customer";
        } else {
            $this->layout = "default";
            AuthComponent::$sessionKey = "Auth.User";
        }
    }

}
