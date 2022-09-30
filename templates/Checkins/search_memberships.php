<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership $membership
 * @var \Cake\Collection\CollectionInterface|string[] $memberships
 * @var \Cake\Collection\CollectionInterface|string[] $active_memberships
 * @var \Cake\Collection\CollectionInterface|string[] $inactive_memberships
 */
//    debug($this->request->getQuery('customer_id'));
//    debug($active_memberships);
//    debug($inactive_memberships);
//    debug($memberships == null);
    $this->assign('title','Search Customer');
?>
<div class="checkins index content">

    <?php if($memberships !=null){?>
    <div class="flex-row-reverse d-flex mt-5 mb-3">
        <?= $this->Html->link(__('Check In Now without membership'), ['action' => 'add','?'=>['customer_id'=>$this->request->getQuery('customer_id'), 'membership_id'=> 'null']], ['class' => 'btn btn-warning ']) ?>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="table-header"><?= $this->Paginator->sort('id', 'Membership Id', ['direction'=>' desc']) ?></th>

                    <th class="table-header"><?= $this->Paginator->sort('start_date', 'Start Date') ?></th>
                    <th class="table-header"><?= $this->Paginator->sort('end_date', 'End Date') ?></th>
                    <th class="table-header"><?= $this->Paginator->sort('is_active', 'Status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if($active_memberships){
            foreach ($active_memberships as $membership): ?>
                <tr>
                    <td><?= $this->Number->format($membership->id) ?></td>
                    <td><?= h($membership->start_date) ?></td>
                    <td><?= h($membership->end_date) ?></td>

                    <td style="">
                        <div style="display: inline-block;border: 1px solid #6eec5a; background-color: #6eec5a; color: white; padding: 0 10px; border-radius: 1rem"> Active</div>
                    </td>
                    <td class="" style="color: white">
                        <?= $this->Html->link(__('Check In Now'), ['action' => 'add','?'=>['customer_id'=>$this->request->getQuery('customer_id'),'membership_id'=>$membership->id]], ['class'=>'btn btn-success']) ?>
                    </td>
                </tr>
            <?php endforeach;} if(!$active_memberships){
                foreach ($inactive_memberships as $membership):
            ?><tr>
                <td><?= $this->Number->format($membership->id) ?></td>
                <td><?= h($membership->start_date) ?></td>
                <td><?= h($membership->end_date) ?></td>

                <td style="">
                    <div style="display: inline-block;border: 1px solid gray; background-color: gray; color: white; padding: 0 10px; border-radius: 1rem"> Inactive</div>
                </td>
                <td class="" style="">
                    <?= $this->Html->link(__('Renew Membership now'),
                        [
                            'controller'=>'memberships',
                            'action' => 'add',
                            '?'=>['customer_id'=>$this->request->getQuery('customer_id')]
                        ],
                        [
                            'class'=>'btn btn-success'
                        ]
                    ) ?>
                </td>
            </tr>
            <?php endforeach;}?>
            </tbody>
        </table>
    </div>
    <?php }else{?>
    <div class="">
        <h3 class="mt-5 mb-3">Check for Membership</h3>
        <div class=" d-flex">
            <?= $this->Html->link(__('Register for Membership!'),
                [
                    'controller'=>'memberships',
                    'action' => 'add',
                    '?'=>['customer_id'=>$this->request->getQuery('customer_id')]
                ],
                [
                    'class'=>'btn btn-outline-primary'
                ]
            ) ?>
            <span class="align-self-center mx-2">or</span>
            <div class="">
                <?= $this->Html->link(__('Check In Now without membership'), ['action' => 'add','?'=>['customer_id'=>$this->request->getQuery('customer_id'), 'membership_id'=> 'null']], ['class' => 'btn btn-warning ']) ?>
            </div>
        </div>

    </div>
    <?php } ?>
</div>
