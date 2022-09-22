<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
    $today_date = date("Y-m-d");
?>
<div class="">
    <div class="container">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <h4 class=" h3 ms-2">Customer Profile</h4>

                    <div class="card">

                        <div class="card-body shadow">
                            <div class="d-flex flex-column align-items-center text-center">
<!--                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">-->
                                <?= $this->Html->image($customer->profile_picture,['class'=>' border border-2 profile_picture rounded-circle'])?>
                                <div class="mt-3">
                                    <h4><?= h($customer->name)?></h4>
                                    <p class="text-secondary mb-1"><?= h($customer->phone_number)?></p>
<!--                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>-->
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id], ['class' => 'my-3 text-decoration-none btn btn-outline-success']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'text-decoration-none btn btn-danger']) ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 ">
                    <h4 class="h3 mb-3 ms-2"> Customer Information</h4>

                    <!--Additional User detail -->
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Customer Id</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= h($customer->id)?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php if($customer->gender == 'm'){
                                        echo 'Male';
                                    }else{
                                        echo 'Female';
                                    }?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date Of Birth</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= h($customer->date_of_birth->format('M d, Y'))?>
                                </div>
                            </div>


<!--                            <div class="row">-->
<!--                                <div class="col-sm-12">-->
<!--                                    <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </div>

                    <h4 class="h3 mt-5 mb-3 ms-2">Memberships Information</h4>
                    <div class="card mb-3 shadow-sm py-0 px-2">
                        <div class="related">
                            <?php if (!empty($customer->memberships)) : ?>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th><?= __('Id') ?></th>
                                                <th><?= __('Bundle Type') ?></th>
                                                <th><?= __('Start Date') ?></th>
                                                <th><?= __('End Date') ?></th>
                                                <th><?= __('Status') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($customer->memberships as $membership) : ?>
                                            <tr>
                                                <td><?= h($membership->id) ?></td>
                                                <td><?= h($membership->bundle->name) ?></td>
                                                <td><?= h($membership->start_date) ?></td>
                                                <td><?= h($membership->end_date) ?></td>
                                                <?php if ($membership->end_date->toDateString() >= $today_date && $membership->start_date->toDateString() <= $today_date){?>
                                                    <td style="">

                                                        <div style="display: inline-block;border: 1px solid #6eec5a; background-color: #6eec5a; color: white; padding: 0 10px; border-radius: 1rem"> Active</div>
                                                    </td>
                                                <?php }else{?>
                                                    <td style="">
                                                        <div style="display: inline-block;border: 1px solid gray; background-color: gray; color: white; padding: 0 10px; border-radius: 1rem"> Inactive</div>
                                                    </td>
                                                <?php }?>

                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <h4 class="h3 mt-5 mb-3 ms-2">Check-ins Information</h4>
                    <div class="card mb-3 shadow-sm py-0 px-2 w-75">
                        <?php if (!empty($customer->checkins)) : ?>
                            <div class="">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th><?= __('Check-in Id') ?></th>

                                            <th><?= __('Date') ?></th>
                                            <th><?= __('Membership ID') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
