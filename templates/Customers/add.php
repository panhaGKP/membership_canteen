<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<?php $this->request->getData() ?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= ('Actions') ?></h4>
            <?= $this->Html->link(('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customers form content">
            <?= $this->Form->create($customer, ['type'=>'file', 'required'=>true]) ?>
            <fieldset>
                <legend><?= ('Add Customer') ?></legend>
                <?php
                echo $this->Form->control('name', ['required'=>true]);

                echo $this->Form->radio('gender', [
                    ['value'=>'m', 'text'=>'Male'],
                    ['value'=>'f', 'text'=>'Female'],
                ]);
                echo $this->Form->control('date_of_birth', ['empty' => true, 'required'=>true]);
                echo $this->Form->control('phone_number');
                echo $this->Form->control('profile_picture', ['type'=>'file', 'required'=>true]);
//                echo $this->Form->control('deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
