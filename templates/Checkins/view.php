<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Checkin $checkin
 */
$this->assign('title','Check-In Details');
$this->Breadcrumbs->add([
    ['title'=>'List Check-ins', 'url'=>['controller'=>'checkins','action'=>'index']],
    ['title'=>
        'View',
        'url'=>['controller'=>'checkins','action'=>'view',$checkin->id],
        'option'=>['class'=>'active']]
]);
?>
<div class="w-50">
    <h4 class="h3 mt-5 mb-3 ms-2">View Check-in</h4>
    <div class="card-body shadow mb-5">
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Check-in ID</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?= $this->Number->format($checkin->id) ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Customer Name</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?= $checkin->has('customer') ? $this->Html->link($checkin->customer->name, ['controller' => 'Customers', 'action' => 'view', $checkin->customer->id],['class'=>'text-decoration-none text-danger']) : '' ?>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Membership ID</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <?= $checkin->membership_id === null ? 'N/A' : $this->Number->format($checkin->membership_id) ?>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-12">
                <?= $this->Html->link(__('Edit Checkin'), ['action' => 'edit', $checkin->id], ['class' => 'text-decoration-none btn btn-outline-success disabled']) ?>
                <?= $this->Form->postLink(__('Delete Checkin'), ['action' => 'delete', $checkin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $checkin->id), 'class' => 'text-decoration-none btn btn-danger']) ?>
            </div>
        </div>

    </div>
</div>
