<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership $membership
 */
    $today_date = date("Y-m-d");
?>
<div class="w-50">
    <h4 class="h3 mt-5 mb-3 ms-2">View Membership</h4>
    <div class="card-body shadow mb-5">
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Membership Id</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?= $this->Number->format($membership->id) ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Customer Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?= $membership->has('customer') ? $this->Html->link($membership->customer->name, ['controller' => 'Customers', 'action' => 'view', $membership->customer->id], ['class'=>'text-decoration-none text-danger']) : '' ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Bundle Type</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?= $membership->has('bundle') ? $this->Html->link($membership->bundle->name, ['controller' => 'Bundles', 'action' => 'view', $membership->bundle->id],['class'=>'text-decoration-none text-danger']) : '' ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Start Date</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?= h($membership->start_date->format('M d, Y')) ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">End Date</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?= h($membership->end_date->format('M d, Y')) ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Status</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?php
                if ($membership->end_date->toDateString() >= $today_date && $membership->start_date->toDateString() <= $today_date){?>
                        <div style="display: inline-block;border: 1px solid #6eec5a; background-color: #6eec5a; color: white; padding: 0 10px; border-radius: 1rem"> Active</div>
                <?php }else{?>
                        <div style="display: inline-block;border: 1px solid gray; background-color: gray; color: white; padding: 0 10px; border-radius: 1rem"> Inactive</div>
                <?php }?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <?= $this->Html->link(__('Edit Membership'), ['action' => 'edit', $membership->id], ['class' => 'text-decoration-none btn btn-outline-success']) ?>
                <?= $this->Form->postLink(__('Delete Membership'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id), 'class' => 'text-decoration-none btn btn-danger']) ?>
            </div>
        </div>

    </div>
