<div class="well">
  <?= __('Please create user account'); ?>
</div>
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
          'url' => ['action' => 'setup']
        ]);?>

    <?= $this->partial('form'); ?>

    <?= $this->Form->button(__('Setup'), [
          'type'=>'submit',
          'class'=>'btn btn-lg btn-primary btn-block'
        ]); ?>
    <?= $this->Form->end();?>
  </div>
</div>
