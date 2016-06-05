<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Informations Controller
 *
 * @property \App\Model\Table\InformationsTable $Informations
 */
class InformationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $informations = $this->paginate($this->Informations);

        $this->set(compact('informations'));
        $this->set('_serialize', ['informations']);
    }

    /**
     * View method
     *
     * @param string|null $id Information id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $information = $this->Informations->get($id, [
            'contain' => ['Users', 'Informations']
        ]);

        $this->set('information', $information);
        $this->set('_serialize', ['information']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $information = $this->Informations->newEntity();
        if ($this->request->is('post')) {
            $information = $this->Informations->patchEntity($information, $this->request->data);
            if ($this->Informations->save($information)) {
                $this->Flash->success(__('The information has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The information could not be saved. Please, try again.'));
            }
        }
        $users = $this->Informations->Users->find('list', ['limit' => 200]);
        $this->set(compact('information', 'users'));
        $this->set('_serialize', ['information']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Information id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $information = $this->Informations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $information = $this->Informations->patchEntity($information, $this->request->data);
            if ($this->Informations->save($information)) {
                $this->Flash->success(__('The information has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The information could not be saved. Please, try again.'));
            }
        }
        $users = $this->Informations->Users->find('list', ['limit' => 200]);
        $this->set(compact('information', 'users'));
        $this->set('_serialize', ['information']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Information id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $information = $this->Informations->get($id);
        if ($this->Informations->delete($information)) {
            $this->Flash->success(__('The information has been deleted.'));
        } else {
            $this->Flash->error(__('The information could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function tags(){
        //getting all passed parameters
        $filter = $this->request->params['pass'];
        
        //find the tagged informations
        $informations = $this->Informations->find('title',[
            'title' => $filter
        ]);
        
        //pass into view
        $this->set([
            'informations' => $informations,
            'paramsForFind' => $filter
        ]);
        
        //die('teste');
    }
 
    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];

        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add', 'tags'])) {
            return true;
        }
        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->params['pass'][0];
        $information = $this->Informations->get($id);
        if ($information->user_id == $user['id']) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
