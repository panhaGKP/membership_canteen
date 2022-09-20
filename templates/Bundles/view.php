<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bundle $bundle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Bundle'), ['action' => 'edit', $bundle->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bundle'), ['action' => 'delete', $bundle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bundle->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bundles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bundle'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bundles view content">
            <h3><?= h($bundle->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($bundle->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bundle->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= h('$ '.$this->Number->format($bundle->price/100)) ?></td>
                </tr>
                <tr>
                    <th><?= __('Duration') ?></th>
                    <td><?= h($this->Number->format($bundle->duration).' days') ?></td>
                </tr>

            </table>
            <div class="related">
                <h4><?= __('Related Memberships') ?></h4>
                <?php if (!empty($bundle->memberships)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th><?= __('Bundle Id') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Deleted') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($bundle->memberships as $memberships) : ?>
                        <tr>
                            <td><?= h($memberships->id) ?></td>
                            <td><?= h($memberships->customer_id) ?></td>
                            <td><?= h($memberships->bundle_id) ?></td>
                            <td><?= h($memberships->start_date) ?></td>
                            <td><?= h($memberships->end_date) ?></td>
                            <td><?= h($memberships->is_active) ?></td>
                            <td><?= h($memberships->deleted) ?></td>
                            <td><?= h($memberships->created) ?></td>
                            <td><?= h($memberships->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Memberships', 'action' => 'view', $memberships->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Memberships', 'action' => 'edit', $memberships->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Memberships', 'action' => 'delete', $memberships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberships->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
