<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Information'), ['action' => 'edit', $information->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Information'), ['action' => 'delete', $information->id], ['confirm' => __('Are you sure you want to delete # {0}?', $information->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Informations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Information'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Informations'), ['controller' => 'Informations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Information'), ['controller' => 'Informations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="informations view large-9 medium-8 columns content">
    <h3><?= h($information->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $information->has('user') ? $this->Html->link($information->user->id, ['controller' => 'Users', 'action' => 'view', $information->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($information->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Argument') ?></th>
            <td><?= h($information->argument) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($information->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Trust Score') ?></th>
            <td><?= $this->Number->format($information->trust_score) ?></td>
        </tr>
        <tr>
            <th><?= __('Information Id') ?></th>
            <td><?= $this->Number->format($information->information_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($information->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($information->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Informations') ?></h4>
        <?php if (!empty($information->informations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Argument') ?></th>
                <th><?= __('Reference Link') ?></th>
                <th><?= __('Trust Score') ?></th>
                <th><?= __('Information Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($information->informations as $informations): ?>
            <tr>
                <td><?= h($informations->id) ?></td>
                <td><?= h($informations->user_id) ?></td>
                <td><?= h($informations->title) ?></td>
                <td><?= h($informations->argument) ?></td>
                <td><?= h($informations->reference_link) ?></td>
                <td><?= h($informations->trust_score) ?></td>
                <td><?= h($informations->information_id) ?></td>
                <td><?= h($informations->created) ?></td>
                <td><?= h($informations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Informations', 'action' => 'view', $informations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Informations', 'action' => 'edit', $informations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Informations', 'action' => 'delete', $informations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $informations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
