<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
    $today_date = date("Y-m-d");
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customers view content">
            <h3><?= h($customer->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($customer->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <?php if ($customer->gender == 'm'){?>
                    <td>Male</td>
                    <?php }else{ ?>
                     <td>Female</td>
                    <?php }?>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($customer->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profile Picture') ?></th>

                    <td style=""><?= $this->Html->image($customer->profile_picture)?></td>
                    <?php
//                    echo $customer->profile_picture;
                    ?>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($customer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Of Birth') ?></th>
                    <td><?= h($customer->date_of_birth) ?></td>
                </tr>

            </table>
            <div class="related">
                <h4><?= __('Check-in Record') ?></h4>
                <?php if (!empty($customer->checkins)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>

                            <th><?= __('Date') ?></th>
                            <th><?= __('Membership ID') ?></th>
                        </tr>
                        <?php foreach ($customer->checkins as $checkin) : ?>
                        <tr>
                            <td><?= h($checkin->id) ?></td>
                            <td><?= h($checkin->created->toDateString()) ?></td>

                            <?php if($checkin->membership_id == null){?>
                            <td><?= h('N/A') ?></td>
                            <?php }else{?>
                            <td><?= h($checkin->membership_id) ?></td>
                            <?php }?>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Memberships Info') ?></h4>
                <?php if (!empty($customer->memberships)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Bundle Type') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Status') ?></th>
                        </tr>
                        <?php foreach ($customer->memberships as $membership) : ?>
                        <tr>
                            <td><?= h($membership->id) ?></td>
                            <td><?= h($membership->bundle->name) ?></td>
                            <td><?= h($membership->start_date) ?></td>
                            <td><?= h($membership->end_date) ?></td>
                            <?php if ($membership->end_date->toDateString() >= $today_date && $membership->start_date->toDateString() <= $today_date){?>
                                <td style="display: flex">

                                    <div style="border: 1px solid #6eec5a; background-color: #6eec5a; color: white; padding: 0 10px; border-radius: 1rem"> Active</div>
                                </td>
                            <?php }else{?>
                                <td style="display: flex">
                                    <div style="border: 1px solid gray; background-color: gray; color: white; padding: 0 10px; border-radius: 1rem"> Inactive</div>
                                </td>
                            <?php }?>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
