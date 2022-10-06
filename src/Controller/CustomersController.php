<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;
/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{
    /**
     * @param EventInterface $event
     * @return \Cake\Http\Response|void|null to change the default layout of Cakephp, Use this beforeFilter function
     */
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
        //customize show limit option and order
        /*$this->paginate = [
            'contain' => ['Customers'],
            'limit' => 10,
            'order'=>[
                'id'=>'desc'
            ]
        ];*/
        $searchText = $this->request->getQuery('searchText');
        if($searchText){
            $list_user = $this->Customers->find('all')
                                         ->where(['or'=>['name like'=>'%'.$searchText.'%','phone_number like'=>'%'.$searchText.'%']]);
//            $list_user = $this->Customers->findAllByNameOrPhoneNumber('%'.$searchText.'%', '%'.$searchText.'%');
        }else{
            $list_user = $this->Customers;
        }
//        $customers = $this->paginate($list_user,['limit'=>'10']);
        $customers = $this->paginate($list_user,[
            'order' => [
                'id' => 'desc'
            ]
        ]);
        $this->set(compact('customers'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $customer = $this->Customers->get($id, [
            'contain' => ['Checkins'=>'Memberships', 'Memberships'=>'Bundles'],
        ]);
        /**
         * @var \App\Model\Entity\Bundle $bundle
         */

        $memberships = $this->Customers->Memberships->find('all')
                                                    ->order('Memberships.id DESC')
                                                    ->where('Memberships.customer_id ='.$id)->toArray();
        $this->set('customer', $customer);
//        $this->set('memberships', $memberships);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $customer = $this->Customers->newEmptyEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if(!$customer->getErrors){
                $profile_picture = $this->request->getData('profile_picture');
//                dd($profile_picture);
                $profile_picture_name = $profile_picture['name'];
                $customer->profile_picture = 'no image';
//                dd($profile_picture_name);
                if($profile_picture_name != null){
                    if( ! is_dir(WWW_ROOT.'img'.DS.'customers_picture')){
                        mkdir(WWW_ROOT.'img'.DS.'customers_picture', 0775);
                    }
                    $targetPath = WWW_ROOT.'img'.DS.'customers_picture'.DS.$profile_picture_name;
                    move_uploaded_file($profile_picture['name'], $targetPath);
                    $customer->profile_picture = 'customers_picture/'.$profile_picture_name;
                }
            }
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $this->set(compact('customer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $customer = $this->Customers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if(!$customer->getErrors){
                $profile_picture = $this->request->getData('profile_picture');
                $profile_picture_name = $profile_picture['name'];
                $customer->profile_picture = 'no image';
                if ($profile_picture_name!=null){
                    if( ! is_dir(WWW_ROOT.'img'.DS.'customers_picture')){
                        mkdir(WWW_ROOT.'img'.DS.'customers_picture', 0775);
                    }
                    $targetPath = WWW_ROOT.'img'.DS.'customers_picture'.DS.$profile_picture_name;
                    move_uploaded_file($profile_picture['name'], $targetPath);
                    $previous_profile_picture_path = WWW_ROOT.'img'.DS.$customer->profile_picture;
                    if(file_exists($previous_profile_picture_path)){
                        echo 'true';
                        unlink($previous_profile_picture_path);
                    }
                    $customer->profile_picture = 'customers_picture/'.$profile_picture_name;
                }

            }
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $this->set(compact('customer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function search()
    {
        $this->viewBuilder()->setLayout('ajax');
        $this->request->allowMethod(['ajax', 'get']);

        $keyword = $this->request->getQuery('keyword');
//        dd($keyword);
        $query = $this->Customers->find('all')
                                 ->where(['or'=>['name like'=>'%'.$keyword.'%','phone_number like'=>'%'.$keyword.'%']]);

        $this->set('customers', $this->paginate($query));
//        $this->set('_serialize', ['customers']);
    }
}
