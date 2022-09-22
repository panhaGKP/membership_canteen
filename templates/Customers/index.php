<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
//$this->setLayout('layout');
?>
<div class="customers index content">
    <div class="d-flex  justify-content-between">

        <h3><?= ('Customers List') ?></h3>
        <div>
            <?= $this->Form->create(null,['type'=>'get', 'align'=>'inline'],)?>
            <?= $this->Form->control('searchText', ['label'=>'Search', 'value'=>$this->request->getQuery('searchText')])?>
            <?= $this->Form->submit('Search')?>
            <?= $this->Form->end()?>
        </div>
    </div>
    <div class="flex-row-reverse d-flex">

        <?= $this->Html->link(__('Add New Customer'), ['action' => 'add'], ['class' => 'btn mt-3 bg-success text-white']) ?>
    </div>

    <div class="table-responsive">
        <table id="test" class="table table-striped">
            <thead>
            <tr>
                <th class="table-header"><?= $this->Paginator->sort('id', 'Customer ID') ?></th>
                <th class="table-header"><?= $this->Paginator->sort('name') ?></th>
                <th class="table-header"><?= $this->Paginator->sort('gender') ?></th>
                <th class="table-header"><?= $this->Paginator->sort('phone_number') ?></th>

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

                    <td class="actions ">
                        <?= $this->Html->link(('View'), ['action' => 'view', $customer->id] ,['class'=>'btn btn-primary py-0 me-2']) ?>
                        <?= $this->Html->link(('Edit'), ['action' => 'edit', $customer->id],['class'=>'btn btn-success py-0 me-2']) ?>
<!--                        <span class="deleted_button">-->
                        <?= $this->Form->postLink('Deleted', ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class'=>'btn btn-danger py-0 me-2']) ?>
<!--                        </span>-->
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator d-flex justify-content-between">
        <p><?= $this->Paginator->counter(('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>

        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . ('first')) ?>
            <?= $this->Paginator->prev('< ' . ('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(('next') . ' >') ?>
            <?= $this->Paginator->last(('last') . ' >>') ?>
        </ul>
    </div>
</div>
