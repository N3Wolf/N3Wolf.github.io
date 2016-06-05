<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Votelocations Controller
 *
 * @property \App\Model\Table\VotelocationsTable $Votelocations
 */
class VotelocationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $votelocations = $this->paginate($this->Votelocations);

        $this->set(compact('votelocations'));
        $this->set('_serialize', ['votelocations']);
    }

    /**
     * View method
     *
     * @param string|null $id Votelocation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $votelocation = $this->Votelocations->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('votelocation', $votelocation);
        $this->set('_serialize', ['votelocation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $votelocation = $this->Votelocations->newEntity();
        if ($this->request->is('post')) {
            $votelocation = $this->Votelocations->patchEntity($votelocation, $this->request->data);
            if ($this->Votelocations->save($votelocation)) {
                $this->Flash->success(__('The votelocation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The votelocation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('votelocation'));
        $this->set('_serialize', ['votelocation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Votelocation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $votelocation = $this->Votelocations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $votelocation = $this->Votelocations->patchEntity($votelocation, $this->request->data);
            if ($this->Votelocations->save($votelocation)) {
                $this->Flash->success(__('The votelocation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The votelocation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('votelocation'));
        $this->set('_serialize', ['votelocation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Votelocation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $votelocation = $this->Votelocations->get($id);
        if ($this->Votelocations->delete($votelocation)) {
            $this->Flash->success(__('The votelocation has been deleted.'));
        } else {
            $this->Flash->error(__('The votelocation could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
