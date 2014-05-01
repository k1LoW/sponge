<?= $this->Html->css('signin'); ?>

<?= $this->Form->create('User', [
      'class' => 'form-signin',
      'inputDefaults' => [
        'div' => false,
        'label' => false,
        'legend' => false,
        'separator' => '&nbsp;&nbsp;',
      ],
      'action' => 'login'
    ]); ?>

<h2 class="form-signin-heading"><?php echo __('Login'); ?></h2>
<div class="form-group <?php if ( !empty($this->Form->validationErrors[$this->Form->model()]) ) { echo 'has-error'; } ?>">
  <?= $this->Form->input('username', [
        'type' => 'text',
        'class'=>'form-control',
      ]); ?>
  <?= $this->Form->input('password', [
        'type' => 'password',
        'class'=>'form-control',
      ]); ?>
  <?= $this->Form->button(__('Login'), [
        'type'=>'submit',
        'class'=>'btn btn-lg btn-primary btn-block'
      ]); ?>
</div>

<?= $this->Form->end(); ?>
