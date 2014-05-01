<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <?= $this->Form->create('User', [
          'inputDefaults' => [
            'div' => 'form-group',
            'legend' => false,
            'separator' => '&nbsp;&nbsp;',
            'class' => 'form-control input-sm',
          ],
          'novalidate' => true,
          'url' => ['action' => 'edit']
        ]);?>
    <?= $this->partial('form'); ?>
    <?= $this->Form->input('id', array('type' => 'hidden')); ?>
    <?= $this->Form->button(__('Submit'), [
          'type'=>'submit',
          'class'=>'btn btn-lg btn-primary btn-block'
        ]); ?>
    <?= $this->Form->end(); ?>
  </div>
</div>
