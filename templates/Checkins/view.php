<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Checkin $checkin
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Checkin'), ['action' => 'edit', $checkin->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Checkin'), ['action' => 'delete', $checkin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $checkin->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Checkins'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Checkin'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="checkins view content">
            <h3><?= h($checkin->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $checkin->has('customer') ? $this->Html->link($checkin->customer->name, ['controller' => 'Customers', 'action' => 'view', $checkin->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($checkin->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Membership Id') ?></th>
                    <td><?= $checkin->membership_id === null ? '' : $this->Number->format($checkin->membership_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($checkin->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($checkin->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
