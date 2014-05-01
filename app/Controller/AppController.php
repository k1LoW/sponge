<?php
App::uses('Controller', 'Controller');
App::import('Partial.Lib/View', 'PartialView');

/**
 * Application level Controller
 *
 */
class AppController extends Controller {

    public $viewClass = 'Partial';

    public $components = [
        'Security' => [
            'validatePost' => false,
        ],
        'Session',
        'Paginator',
        'Auth' => [
        ],
        'Transition.Transition',
        'Routine.Routine',
        'Escape.Escape' => ['formDataEscape' => false],
        'DebugKit.Toolbar',
    ];

    public $helpers = [
        'Session',
        'Html' => ['className' => 'BoostCake.BoostCakeHtml'],
        'Form' => ['className' => 'BoostCake.BoostCakeForm'],
        'Paginator' => ['className' => 'BoostCake.BoostCakePaginator'],
    ];

    /**
     * beforeFilter
     *
     */
    public function beforeFilter(){
        $this->setFlashElement = [
            'success' => 'alert',
            'error' => 'alert',
        ];
        $this->setFlashParams = [
            'success' => [
                'plugin' => 'BoostCake',
                'class' => 'alert-success'
            ],
            'error' => [
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ],
        ];
        $this->Transition->flashParams = [
            'element' => 'alert',
            'params' => [
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ],
            'key' => 'flash',
        ];

        parent::beforeFilter();

        Configure::write('Config.language', 'ja');

        $baseUrl = Router::url('/');
        $fullBaseUrl = Router::url('/', true);
        $title_for_layout = __('Sponge Cake');
        $this->set(compact(
            'baseUrl',
            'fullBaseUrl',
            'title_for_layout'
        ));
    }
}
