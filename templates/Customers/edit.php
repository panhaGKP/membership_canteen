<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customers form content">
            <?= $this->Form->create($customer, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Edit Customer') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->radio('gender', [
                        ['value'=>'m', 'text'=>'Male'],
                        ['value'=>'f', 'text'=>'Female'],
                    ]);
                    echo $this->Form->control('date_of_birth', ['empty' => true]);
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('profile_picture', ['type'=>'file']);
//                    echo $this->Form->control('deleted');
                    debug($customer->profile_picture);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
