<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<div class="customers index content">
    <?= $this->Form->create(null,['type'=>'get'])?>
    <?= $this->Form->control('searchText', ['label'=>'Search', 'value'=>$this->request->getQuery('searchText')])?>
    <?= $this->Form->submit()?>
    <?= $this->Form->end()?>
    <?= $this->Html->link(('New Customer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= ('Customers') ?></h3>
    <div class="table-responsive">
        <table id="test" >
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('gender') ?></th>
                <th><?= $this->Paginator->sort('phone_number') ?></th>

                <th class="actions"><?= ('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= $this->Number->format($customer->id) ?></td>
                    <td><?= h($customer->name) ?></td>
                    <?php if($customer->gender == 'm') {?>
                    <td><?= h('Male') ?></td>
                    <?php }else {?>
                    <td><?= h('Female') ?></td>
                    <?php } ?>
                    <td><?= h($customer->phone_number) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(('View'), ['action' => 'view', $customer->id]) ?>
                        <?= $this->Html->link(('Edit'), ['action' => 'edit', $customer->id]) ?>
                        <?= $this->Form->postLink(('Delete'), ['action' => 'delete', $customer->id], ['confirm' => ('Are you sure you want to delete # {0}?'), $customer->id]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . ('first')) ?>
            <?= $this->Paginator->prev('< ' . ('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(('next') . ' >') ?>
            <?= $this->Paginator->last(('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
