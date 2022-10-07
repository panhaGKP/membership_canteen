<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bundle $bundle
 */
$this->assign('title','Add Bundle');
$this->Breadcrumbs->add([
    ['title'=>'List Bundles', 'url'=>['controller'=>'bundles','action'=>'index']],
    ['title'=>
        'Add',
        'url'=>['controller'=>'bundles','action'=>'add'],
        'option'=>['class'=>'active']]
]);
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="bundles form content">
            <?= $this->Form->create($bundle) ?>
            <fieldset>
                <legend class="mt-5 mb-3 h2"><?= __('Add Bundle') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label'=>['floating'=>true], 'class'=>'w-50']);
                    echo $this->Form->control('price' ,['label'=>['floating'=>true], 'class'=>'w-50']);
                    echo $this->Form->control('duration' ,['label'=>['floating'=>true],'class'=>'w-50']);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Add Bundle'),['class'=>'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
