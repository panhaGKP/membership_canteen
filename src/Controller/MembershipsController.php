<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Memberships Controller
 *
 * @property \App\Model\Table\MembershipsTable $Memberships
 * @method \App\Model\Entity\Membership[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MembershipsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('project_layout');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $this->paginate = [
            'contain' => ['Customers', 'Bundles'],
            'limit' => 10,
            'order'=>[
                'id'=>'asc'
            ]

        ];

        $searchText = $this->request->getQuery('searchText');

        if($searchText){
            $searchText = trim($searchText);
            $membership_id = $this->Memberships->Customers->find()->select('id')->where(['or'=>['name like'=>'%'.$searchText.'%','phone_number like'=>'%'.$searchText.'%']]);
//            dd($membership_id);
            $membership_list = $this->Memberships->find()->where(['customer_id in'=> $membership_id]);
//            dd($membership_list);

        }else{

            $membership_list = $this->Memberships;
        }
//        $membership_list=$this->Memberships;
        $memberships = $this->paginate($membership_list);

        $this->set(compact('memberships'));
    }

    /**
     * View method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $membership = $this->Memberships->get($id, [
            'contain' => ['Customers', 'Bundles'],
        ]);

        $this->set(compact('membership'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $membership = $this->Memberships->newEmptyEntity();
        if ($this->request->is('post')) {
//            debug($membership);
            $membership = $this->Memberships->patchEntity($membership, $this->request->getData());

            $bundle_id = $membership->bundle_id;
            /**
             * @var \App\Model\Entity\Bundle $bundle
             */
            //handle data before saving such as duration, end date and is active
            $bundle = $this->Memberships->Bundles->find()->where(['id' => $bundle_id])->first();
            $duration = $bundle->duration;
            $membership->end_date = $membership->start_date->addDay($duration);

            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $customers = $this->Memberships->Customers->find('list', ['limit' => 200])->all();
        $bundles = $this->Memberships->Bundles->find('list', ['limit' => 200])->all();
        $this->set(compact('membership', 'customers', 'bundles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membership = $this->Memberships->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membership = $this->Memberships->patchEntity($membership, $this->request->getData());
            if ($this->Memberships->save($membership)) {
                $this->Flash->success(__('The membership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membership could not be saved. Please, try again.'));
        }
        $customers = $this->Memberships->Customers->find('list', ['limit' => 200])->all();
        $bundles = $this->Memberships->Bundles->find('list', ['limit' => 200])->all();
        $this->set(compact('membership', 'customers', 'bundles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Membership id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membership = $this->Memberships->get($id);
        if ($this->Memberships->delete($membership)) {
            $this->Flash->success(__('The membership has been deleted.'));
        } else {
            $this->Flash->error(__('The membership could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
