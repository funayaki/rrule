<?php
namespace Rrule\Controller\Admin;

/**
 * Rrules Controller
 *
 *
 * @method \Rrule\Model\Entity\Rrule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RrulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $rrules = $this->paginate($this->loadModel());

        $this->set(compact('rrules'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setTemplate('form');

        $rrule = $this->loadModel()->newEntity();
        if ($this->request->is('post')) {
            $rrule = $this->loadModel()->patchEntity($rrule, $this->request->getData());
            if ($this->loadModel()->save($rrule)) {
                $this->Flash->success(__d('funayaki', 'The rrule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('funayaki', 'The rrule could not be saved. Please, try again.'));
        }
        $this->set(compact('rrule'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rrule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setTemplate('form');

        $rrule = $this->loadModel()->get($id, [
            'contain' => [
                'Occurrences'
            ]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rrule = $this->loadModel()->patchEntity($rrule, $this->request->getData());
            if ($this->loadModel()->save($rrule)) {
                $this->Flash->success(__d('funayaki', 'The rrule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('funayaki', 'The rrule could not be saved. Please, try again.'));
        }
        $this->set(compact('rrule'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rrule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rrule = $this->loadModel()->get($id);
        if ($this->loadModel()->delete($rrule)) {
            $this->Flash->success(__d('funayaki', 'The rrule has been deleted.'));
        } else {
            $this->Flash->error(__d('funayaki', 'The rrule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
