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
                'controller' => 'adminUsers',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'adminUsers',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'adminUsers',
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

    public function beforeFilter() {
        if($this->request->params['controller'] == 'Customers') {
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
                'admin' => true
            ];
            $this->Auth->loginRedirect = [
                'controller' => 'items',
                'action' => 'top',
                'admin' => true
            ];
            $this->Auth->logoutRedirect = [
                'controller' => 'customers',
                'action' => 'signin',
                'admin' => true
            ];
            AuthComponent::$sessionKey = "Auth.Customer";
        } else {
            $this->layout = "default";
            AuthComponent::$sessionKey = "Auth.User";
        }
    }
    
    // public $helpers = [
    //        'Session',
    //        'Html' => ['className' => 'TwitterBootstrap.BootstrapHtml'],
    //        'Form' => ['className' => 'TwitterBootstrap.BootstrapForm'],
    //        'Paginator' => ['className' => 'TwitterBootstrap.BootstrapPaginator'],
    //  ];
    //
    //  public $uses = [];
}
