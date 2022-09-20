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
    public function add()
    {
        $checkin = $this->Checkins->newEmptyEntity();
        if ($this->request->is('post')) {

            $data = $this->request->getData();


            //debug(getType($checkin->membership_id));

            //check if user have membership
            $customer_id = $checkin->customer_id;
//            debug($customer_id);
            $memberships =  $this->Checkins->Customers->Memberships->find()
                ->where(['customer_id'=>$data['customer_id']])
                ->toArray();
            //dd($memberships);
            //if memberships, check if the status is active
            //$membership_status = false;
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
//            dd($data);

            $checkin = $this->Checkins->patchEntity($checkin, $data);
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
}
