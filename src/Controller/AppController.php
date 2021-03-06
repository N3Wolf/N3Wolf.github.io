<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    use \Crud\Controller\ControllerTrait;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth',[
            //'authorize' => 'Controller',
            'authenticate' =>[
                'Form' =>[
                    'fields' =>[
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);
//         Allow the display action so our pages controller
//         continues to work.
        $this->Auth->allow(['display']);
        $this->Auth->allow(['view']);

        /*$this->loadComponent('Crud.Crud', [
            'actions' => [
                //'index' => [
                //    'className' => 'Crud.Index',
                //    'view' => 'my_index',
                //],
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete',
               // 'Crud.Lookup',
            ],
            'listeners' => [
                // New listeners that need to be added:
                'CrudView.View',
                'Crud.Redirect',
                'Crud.RelatedModels',
                //'CrudView.Search',
            ]
        ]);*/
    }

    
    public function isAuthorized($user)
    {
        return false;
    }
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
       /*//  For CakePHP 3.1+
        if ($this->viewBuilder()->className() === null) {
            $this->viewBuilder()->className('CrudView\View\CrudView');
        }*/
        //$this->viewBuilder()->theme('BootstrapUI');
        
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}