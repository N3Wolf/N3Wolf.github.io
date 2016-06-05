<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Information'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="informations index large-9 medium-8 columns content">
    <h3><?= __('Informations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('argument') ?></th>
                <th><?= $this->Paginator->sort('trust_score') ?></th>
                <th><?= $this->Paginator->sort('information_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($informations as $information): ?>
            <tr>
                <td><?= $this->Number->format($information->id) ?></td>
                <td><?= $information->has('user') ? $this->Html->link($information->user->id, ['controller' => 'Users', 'action' => 'view', $information->user->id]) : '' ?></td>
                <td><?= h($information->title) ?></td>
                <td><?= h($information->argument) ?></td>
                <td><?= $this->Number->format($information->trust_score) ?></td>
                <td><?= $this->Number->format($information->information_id) ?></td>
                <td><?= h($information->created) ?></td>
                <td><?= h($information->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $information->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $information->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $information->id], ['confirm' => __('Are you sure you want to delete # {0}?', $information->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
