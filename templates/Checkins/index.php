<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Checkin[]|\Cake\Collection\CollectionInterface $checkins
 */
//debug($checkins)
$this->assign('title','Check-Ins List');
?>
<div class="checkins index content">
    <div class="d-flex  justify-content-between mt-3 mb-3">
        <h3><?= __('Check-ins List') ?></h3>
        <div class="flex-row-reverse d-flex">
            <div class="btn bg-success ">
                <?php echo $this->Html->icon('bi bi-plus-lg text-white'); ?>
                <?= $this->Html->link(__('New Checkin'), ['action' => 'chooseCustomer'], ['class' => 'text-decoration-none text-white']) ?>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="table-header"><?= $this->Paginator->sort('id', ' Check-in ID', ['direction'=>' desc']) ?></th>

                    <th class="table-header"><?= $this->Paginator->sort('created', ' Date') ?></th>
                    <th class="table-header"><?= $this->Paginator->sort('customer_id', 'Customer Name') ?></th>
                    <th class="table-header"><?= $this->Paginator->sort(' created', 'Check-in') ?></th>
                    <th><?= h('Phone Number') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($checkins as $checkin): ?>
                <tr>
                    <td><?= $this->Number->format($checkin->id) ?></td>
                    <td><?= h($checkin->created->format('d-m-Y')) ?></td>
                    <td><?= $checkin->has('customer') ? $this->Html->link($checkin->customer->name, ['controller' => 'Customers', 'action' => 'view', $checkin->customer->id], ['class'=>'text-decoration-none text-danger']) : '' ?></td>
                    <td><?= h($checkin->created->format('h:i a')) ?></td>
                    <td><?= h($checkin->customer->phone_number) ?></td>
                    <td class="actions">
                        <?= $this->Form->Html->link(__('View'),['action'=>'view',$checkin->id],['class'=>'btn btn-primary py-0 me-2'])?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $checkin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $checkin->id),'class'=>'btn btn-danger py-0 me-2']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator d-flex justify-content-between">
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>

        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>
