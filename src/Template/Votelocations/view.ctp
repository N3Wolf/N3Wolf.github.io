<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Votelocation'), ['action' => 'edit', $votelocation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Votelocation'), ['action' => 'delete', $votelocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $votelocation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Votelocations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Votelocation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="votelocations view large-9 medium-8 columns content">
    <h3><?= h($votelocation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('City Code') ?></th>
            <td><?= h($votelocation->city_code) ?></td>
        </tr>
        <tr>
            <th><?= __('State Code') ?></th>
            <td><?= h($votelocation->state_code) ?></td>
        </tr>
        <tr>
            <th><?= __('City Name') ?></th>
            <td><?= h($votelocation->city_name) ?></td>
        </tr>
        <tr>
            <th><?= __('State Name') ?></th>
            <td><?= h($votelocation->state_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Mesoregion Name') ?></th>
            <td><?= h($votelocation->mesoregion_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Microregion Code') ?></th>
            <td><?= h($votelocation->microregion_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Microregion Name') ?></th>
            <td><?= h($votelocation->microregion_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($votelocation->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Complete City Code') ?></th>
            <td><?= $this->Number->format($votelocation->complete_city_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Mesoregion Code') ?></th>
            <td><?= $this->Number->format($votelocation->mesoregion_code) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($votelocation->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Rg') ?></th>
                <th><?= __('Votelocation Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($votelocation->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->rg) ?></td>
                <td><?= h($users->votelocation_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
