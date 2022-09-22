<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bundle[]|\Cake\Collection\CollectionInterface $bundles
 */
?>
<div class="bundles index content">
    <div class="d-flex  justify-content-between mt-3 mb-3">
        <h3><?= __('Bundles') ?></h3>
        <?= $this->Html->link(__('New Bundle'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="table-header"><?= $this->Paginator->sort('id') ?></th>
                    <th class="table-header"><?= $this->Paginator->sort('name') ?></th>
                    <th class="table-header"><?= $this->Paginator->sort('price','Price ($)') ?></th>
                    <th class="table-header"><?= $this->Paginator->sort('duration','Duration (day)') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bundles as $bundle): ?>
                <tr>
                    <td><?= $this->Number->format($bundle->id) ?></td>
                    <td><?= h($bundle->name) ?></td>
                    <td><?= h($this->Number->format($bundle->price/100)) ?></td>
                    <td><?= $this->Number->format($bundle->duration) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bundle->id],['class'=>'btn btn-outline-success py-0 me-2 disabled']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bundle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bundle->id),'class'=>'btn btn-danger py-0 me-2']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator d-flex justify-content-between">
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>

        <ul class="pagination ">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>
