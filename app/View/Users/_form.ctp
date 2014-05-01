<?= $this->Form->input('username', [
      'type' => 'text',
    ]); ?>
<?= $this->Form->input('email', [
      'type' => 'email',
    ]); ?>

<?php if ( $this->Form->params['action'] === 'edit' ): ?>
  <?= $this->Form->input('update_password_flg', [
        'type' => 'checkbox',
        'id'=>'update_password_flg',
        'label' => __('Update Password Flg'),
        'div'=>false
      ]); ?>
<?php endif; ?>

<hr />

<?= $this->Form->input('password', [
      'type' => 'password',
    ]); ?>
<?= $this->Form->input('password_confirm', [
      'type' => 'password',
    ]); ?>
