<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership $membership
 */
    $today_date = date("Y-m-d");
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Membership'), ['action' => 'edit', $membership->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Membership'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Memberships'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Membership'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="memberships view content">
            <table>
                <tr>
                    <th><?= __('Membership Id') ?></th>
                    <td><?= $this->Number->format($membership->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer name') ?></th>
                    <td><?= $membership->has('customer') ? $this->Html->link($membership->customer->name, ['controller' => 'Customers', 'action' => 'view', $membership->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Bundle') ?></th>
                    <td><?= $membership->has('bundle') ? $this->Html->link($membership->bundle->name, ['controller' => 'Bundles', 'action' => 'view', $membership->bundle->id]) : '' ?></td>
                </tr>


                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($membership->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($membership->end_date) ?></td>
                </tr>

                <tr>

                    <th><?= __('Status') ?></th>
                    <?php
                    if ($membership->end_date->toDateString() >= $today_date && $membership->start_date->toDateString() <= $today_date){?>
                    <td style="display: flex">
                        <div style="border: 1px solid #6eec5a; background-color: #6eec5a; color: white; padding: 0 10px; border-radius: 1rem"> Active</div>
                    </td>
                    <?php }else{?>
                    <td style="display: flex">
                        <div style="border: 1px solid gray; background-color: gray; color: white; padding: 0 10px; border-radius: 1rem"> Inactive</div>
                    </td>
                    <?php }?>
                </tr>
            </table>
        </div>
    </div>
</div>
