<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Main Controller
 *
 *
 * @method \App\Model\Entity\Main[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MainController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // echo "hello world";
        // $this->set(compact('main'));
    }

    public function view($id = null)
    {
        echo "hello world";
        // $main = $this->Main->get($id, [
        //     'contain' => [],
        // ]);

        // $this->set('main', $main);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $main = $this->Main->newEntity();
        if ($this->request->is('post')) {
            $main = $this->Main->patchEntity($main, $this->request->getData());
            if ($this->Main->save($main)) {
                $this->Flash->success(__('The main has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The main could not be saved. Please, try again.'));
        }
        $this->set(compact('main'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Main id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $main = $this->Main->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $main = $this->Main->patchEntity($main, $this->request->getData());
            if ($this->Main->save($main)) {
                $this->Flash->success(__('The main has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The main could not be saved. Please, try again.'));
        }
        $this->set(compact('main'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Main id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $main = $this->Main->get($id);
        if ($this->Main->delete($main)) {
            $this->Flash->success(__('The main has been deleted.'));
        } else {
            $this->Flash->error(__('The main could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
