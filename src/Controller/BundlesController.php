<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Bundles Controller
 *
 * @property \App\Model\Table\BundlesTable $Bundles
 * @method \App\Model\Entity\Bundle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BundlesController extends AppController{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('project_layout');
    }

    public $paginate =[
            'limit'=> 5,
        ];
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $bundles = $this->paginate($this->Bundles);

        $this->set(compact('bundles'));
    }

    /**
     * View method
     *
     * @param string|null $id Bundle id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $bundle = $this->Bundles->get($id, [
            'contain' => ['Memberships'],
        ]);

        $this->set(compact('bundle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $bundle = $this->Bundles->newEmptyEntity();
        if ($this->request->is('post')) {

            $bundle = $this->Bundles->patchEntity($bundle, $this->request->getData());
            $bundle->price = $bundle->price*100;

            if ($this->Bundles->save($bundle)) {
                $this->Flash->success(__('The bundle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bundle could not be saved. Please, try again.'));
        }
        $this->set(compact('bundle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bundle id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $bundle = $this->Bundles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bundle = $this->Bundles->patchEntity($bundle, $this->request->getData());
            $bundle->price = $bundle->price*100;

            if ($this->Bundles->save($bundle)) {
                $this->Flash->success(__('The bundle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bundle could not be saved. Please, try again.'));
        }
        $this->set(compact('bundle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bundle id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bundle = $this->Bundles->get($id);
        if ($this->Bundles->delete($bundle)) {
            $this->Flash->success(__('The bundle has been deleted.'));
        } else {
            $this->Flash->error(__('The bundle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
