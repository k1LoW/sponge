<h2><?= __('Users'); ?></h2>
<div class="row">
    <p>
        <?=
        $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>
    </p>
    <table class="table table-bordered table-condensed">
        <tr>
            <th><?= $this->Paginator->sort('username'); ?></th>
            <th><?= $this->Paginator->sort('email'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['User']['username']; ?></td>
                <td><?= $user['User']['email']; ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                    <?= $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['username'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?= $this->Paginator->pagination([
            'ul' => 'pagination'
        ]); ?>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <?= $this->Html->link(__('New User'), [
                'action' => 'add'
            ], [
                'class'=>'btn btn-lg btn-primary btn-block'
            ]); ?>
    </div>
</div>
