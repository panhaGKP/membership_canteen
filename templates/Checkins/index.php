<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Checkin[]|\Cake\Collection\CollectionInterface $checkins
 */
//debug($checkins)
?>
<div class="checkins index content">
    <?= $this->Html->link(__('New Checkin'), ['action' => 'chooseCustomer'], ['class' => 'button float-right']) ?>
    <h3><?= __('Checkins') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ' Check-in ID', ['direction'=>' desc']) ?></th>

                    <th><?= $this->Paginator->sort('created', ' Date') ?></th>
                    <th><?= $this->Paginator->sort('customer_id', 'Customer Name') ?></th>
                    <th><?= $this->Paginator->sort(' created', 'Check-in') ?></th>
                    <th><?= h('Phone Number') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($checkins as $checkin): ?>
                <tr>
                    <td><?= $this->Number->format($checkin->id) ?></td>
                    <td><?= h($checkin->created->toDateString()) ?></td>
                    <td><?= $checkin->has('customer') ? $this->Html->link($checkin->customer->name, ['controller' => 'Customers', 'action' => 'view', $checkin->customer->id]) : '' ?></td>
                    <td><?= h($checkin->created->format('h:i a')) ?></td>
                    <td><?= h($checkin->customer->phone_number) ?></td>
                    <td class="actions">
                        <?= $this->Form->Html->link(__('View'),['controller'=>'Customers', 'action'=>'view',$checkin->customer->id])?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $checkin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $checkin->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
