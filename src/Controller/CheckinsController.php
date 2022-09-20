<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\App;

/**
 * Checkins Controller
 *
 * @property \App\Model\Table\CheckinsTable $Checkins
 * @method \App\Model\Entity\Checkin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CheckinsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {
        //customize show limit option and order
        $this->paginate = [
            'contain' => ['Customers'],
            'limit' => 10,
            'order'=>[
                'id'=>'desc'
            ]
        ];
        $checkins = $this->paginate($this->Checkins);

        $this->set(compact('checkins'));
    }


    /**
     * View method
     *
     * @param string|null $id Checkin id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $checkin = $this->Checkins->get($id, [
            'contain' => ['Customers'],
        ]);

        $this->set(compact('checkin'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addOldVersion()
    {
        $checkin = $this->Checkins->newEmptyEntity();
        if ($this->request->is('post')) {

            $data = $this->request->getData();

            $memberships =  $this->Checkins->Customers->Memberships->find()
                ->where(['customer_id'=>$data['customer_id']])
                ->toArray();

            $membership_id = null;

                //check for active memberships
                foreach ($memberships as $membership){
                    //if status is active
                    if($membership->is_active){
                        //add membership to database
                        $membership_id = $membership->id;
                        break;
                    }
                }
            $data['membership_id'] = $membership_id;


            $checkin = $this->Checkins->patchEntity($checkin, $data);
            if ($this->Checkins->save($checkin)) {
                $this->Flash->success(__('The checkin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The checkin could not be saved. Please, try again.'));
        }
        $customers = $this->Checkins->Customers->find('list', ['limit' => 200])->all();
        $this->set(compact('checkin', 'customers'));
    } //add old version
    public function add() // new version
    {
        $data =$this->request->getQuery();
        $data['customer_id'] = intval($data['customer_id']);
        $data['membership_id'] = $data['membership_id'] == 'null'? null : intval($data['membership_id']);
        $checkin = $this->Checkins->newEmptyEntity();

        $checkin = $this->Checkins->patchEntity($checkin, $data);


        if ($this->Checkins->save($checkin)) {
            $this->Flash->success(__('The checkin has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The checkin could not be saved. Please, try again.'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Checkin id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $checkin = $this->Checkins->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkin = $this->Checkins->patchEntity($checkin, $this->request->getData());
            if ($this->Checkins->save($checkin)) {
                $this->Flash->success(__('The checkin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The checkin could not be saved. Please, try again.'));
        }
        $customers = $this->Checkins->Customers->find('list', ['limit' => 200])->all();
        $this->set(compact('checkin', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Checkin id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $checkin = $this->Checkins->get($id);
        if ($this->Checkins->delete($checkin)) {
            $this->Flash->success(__('The checkin has been deleted.'));
        } else {
            $this->Flash->error(__('The checkin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function chooseCustomer(){
        if($this->request->is('post')){
            $data = $this->request->getData();
            dd($data);
        }
        $customers = $this->Checkins->Customers->find('list', ['limit' => 200])->all();
        $this->set(compact('customers'));
    }
    public function searchMemberships(){
        /**
         * @var \Cake\Collection\CollectionInterface|string[] $membership
         */
        $data = $this->request->getQuery();
      //  debug($data);
        $customer_id = intval($data['customer_id']);
      //  dd($customer_id);
        $memberships =  $this->Checkins->Customers->Memberships->find()
            ->where(['customer_id'=>$data['customer_id']])
            ->toArray();
        /**
         * @var \App\Model\Entity\Membership $membership
         */
        $active_memberships = array();
        $inactive_memberships=array();
        foreach ($memberships as $membership){
            if($membership->is_active){
                $active_memberships[] = $membership;
            }else{
                $inactive_memberships[] = $membership;
            }
//            debug($membership->is_active);
        }
//        debug($active_memberships);
//        debug($inactive_memberships);
//        exit();
        $this->set(compact('active_memberships', 'inactive_memberships','memberships'));
    }

}
