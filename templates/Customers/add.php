<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
use BootstrapUI\View\Helper\FormHelper;
?>
<?php $this->request->getData() ?>
<div class="row flex-nowrap">
    <div class="column-responsive column-80">
        <div class="customers form content ">
            <?= $this->Form->create($customer, ['type'=>'file', 'required'=>true,
                'align'=>'',
                'sm' => [
                    FormHelper::GRID_COLUMN_ONE => 6,
                    FormHelper::GRID_COLUMN_TWO => 6,
                ],
                // column sizes for the `md` screen-size/breakpoint
                'md' => [
                    FormHelper::GRID_COLUMN_ONE => 4,
                    FormHelper::GRID_COLUMN_TWO => 8,
                ],
                ]) ?>
            <fieldset>
                <legend class="h3 mb-5"><?= ('Add Customer') ?></legend>
                <?php
                echo $this->Form->control('name', ['required'=>true, 'class'=>'mb-3 w-50', 'label'=>[
                    'floating'=>true]]);
                ?>
                <div class="fs-5">Gender</div>
                <div class="d-flex radio">
                    <?php
                    echo $this->Form->radio('gender', [['value'=>'m', 'text'=>'Male'],['value'=>'f', 'text'=>'Female']]);
                    ?>
                </div>
                <?php
                echo $this->Form->control('date_of_birth', ['empty' => true, 'required'=>true, 'class'=>'my-3 w-50','label'=>[
                    'floating'=>true],]);
                echo $this->Form->control('phone_number', ['class'=>'mb-3 w-50','label'=>['floating'=>true]]);
                echo $this->Form->control('profile_picture', ['type'=>'file', 'required'=>true, 'class'=>'w-50']);
//                echo $this->Form->control('deleted');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Add Customer'),['class'=>'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
