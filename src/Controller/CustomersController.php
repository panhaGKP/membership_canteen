<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{
    public $paginate =[
        'limit'=>10,
        'order'=>[
            'id'=>'desc'
        ]
    ];
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $searchText = $this->request->getQuery('searchText');
        if($searchText){
            $list_user = $this->Customers->find('all')
                                         ->where(['or'=>['name like'=>'%'.$searchText.'%','phone_number like'=>'%'.$searchText.'%']]);
        }else{
            $list_user = $this->Customers;
        }
        $customers = $this->paginate($list_user);

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

//        dd($customer);
        $this->set(compact('customer'));
//        $this->set('bundle_name','VIP');
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
                $profile_picture_name = $profile_picture->getClientFilename();

                if( ! is_dir(WWW_ROOT.'img'.DS.'customers_picture')){
                    mkdir(WWW_ROOT.'img'.DS.'customers_picture', 0775);
                }
                $targetPath = WWW_ROOT.'img'.DS.'customers_picture'.DS.$profile_picture_name;
                if ($profile_picture_name) $profile_picture->moveTo($targetPath);
                $customer->profile_picture = 'customers_picture/'.$profile_picture_name;
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
                $profile_picture_name = $profile_picture->getClientFilename();
                if ($profile_picture_name){
                    if( ! is_dir(WWW_ROOT.'img'.DS.'customers_picture')){
                        mkdir(WWW_ROOT.'img'.DS.'customers_picture', 0775);
                    }
                    $targetPath = WWW_ROOT.'img'.DS.'customers_picture'.DS.$profile_picture_name;
                    $profile_picture->moveTo($targetPath);

                    $previous_profile_picture_path = WWW_ROOT.'img'.DS.$customer->profile_picture;
//                    $previous_profile_picture_path = $customer->profile_picture;
//                    debug($previous_profile_picture_path);
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
}
