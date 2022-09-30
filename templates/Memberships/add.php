<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership $membership
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \Cake\Collection\CollectionInterface|string[] $bundles
 */
//    debug(getType($customers));
//    debug(getType($this->request->getQuery()));
    $this->assign('title','Add Membership');
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="memberships form content">
            <?= $this->Form->create($membership) ?>
            <fieldset>
                <legend class="mt-4 mb-3 fs-2"><?= __('Add Membership') ?></legend>
                <?php
                    if ($this->request->getQuery('customer_id') !== null){
                        echo $this->Form->control('customer_id', ['value'=>$this->request->getQuery('customer_id'), 'label'=>['floating'=>true],'class'=>'w-50']);
                    }else{
                        echo $this->Form->control('customer_id', ['options' => $customers, 'class'=>'w-50', 'label'=>['floating'=>true],]);
                    }
                    echo $this->Form->control('bundle_id', ['options' => $bundles, 'class'=>'w-50', 'label'=>['floating'=>true],]);
                    echo $this->Form->control('start_date', ['label'=>['floating'=>true], 'class'=>'w-50']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
