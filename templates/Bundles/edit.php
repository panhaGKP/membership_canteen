<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bundle $bundle
 */
$this->Breadcrumbs->add([
    ['title'=>'List Bundles', 'url'=>['controller'=>'bundles','action'=>'index']],
    ['title'=>
        'Edit',
        'url'=>['controller'=>'bundles','action'=>'edit',$bundle->id],
        'option'=>['class'=>'active']]
]);
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="bundles form content">
            <?= $this->Form->create($bundle) ?>
            <fieldset>
                <legend class="mt-5 mb-3 h3"><?= __('Edit Bundle') ?></legend>
                <?php
                    echo $this->Form->control('name',['label'=>['floating'=>true]]);
                    echo $this->Form->control('price',['label'=>['floating'=>true], 'value'=>$bundle->price/100]);
                    echo $this->Form->control('duration',['label'=>['floating'=>true]]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Save Edit'), ['class'=>'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
