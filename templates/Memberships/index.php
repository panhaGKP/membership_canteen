<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership[]|\Cake\Collection\CollectionInterface $memberships
 */
?>
<div class="memberships index content">
    <?= $this->Form->create(null,['type'=>'get'])?>
    <?= $this->Form->control('searchText', ['label'=>'Search Membership', 'value'=>$this->request->getQuery('searchText')])?>
    <?= $this->Form->submit('Search')?>
    <?= $this->Form->end()?>
    <?= $this->Html->link(__('New Membership'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Memberships') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID Number') ?></th>
                    <th><?= $this->Paginator->sort('customer_id', 'Customer Name') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('customer_id', 'Phone Number') ?></th>
                    <th><?= $this->Paginator->sort('is_active', 'Status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($memberships as $membership): ?>
                <tr>
                    <td><?= $this->Number->format($membership->id) ?></td>
                    <td><?= $membership->has('customer') ? $this->Html->link($membership->customer->name, ['controller' => 'Customers', 'action' => 'view', $membership->customer->id]) : '' ?></td>
                    <td><?= $membership->customer->gender == 'm'?  h('Male'): h('Female') ?></td>
                    <td><?= $membership->has('customer') ? h($membership->customer->phone_number) : ''?></td>
                    <?php if ($membership->is_active){?>
                    <td style="display: flex">
                        <div style="border: 1px solid #6eec5a; background-color: #6eec5a; color: white; padding: 0 10px; border-radius: 1rem"> Active</div>
                    </td>
                    <?php }else{?>
                        <td style="display: flex">
                            <div style="border: 1px solid gray; background-color: gray; color: white; padding: 0 10px; border-radius: 1rem"> Inactive</div>
                        </td>
                    <?php }?>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller'=> 'Customers', 'action'=> 'view', $membership->customer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $membership->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]) ?>
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
