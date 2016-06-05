<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Votelocation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="votelocations index large-9 medium-8 columns content">
    <h3><?= __('Votelocations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('complete_city_code') ?></th>
                <th><?= $this->Paginator->sort('city_code') ?></th>
                <th><?= $this->Paginator->sort('state_code') ?></th>
                <th><?= $this->Paginator->sort('city_name') ?></th>
                <th><?= $this->Paginator->sort('state_name') ?></th>
                <th><?= $this->Paginator->sort('mesoregion_code') ?></th>
                <th><?= $this->Paginator->sort('mesoregion_name') ?></th>
                <th><?= $this->Paginator->sort('microregion_code') ?></th>
                <th><?= $this->Paginator->sort('microregion_name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($votelocations as $votelocation): ?>
            <tr>
                <td><?= $this->Number->format($votelocation->id) ?></td>
                <td><?= $this->Number->format($votelocation->complete_city_code) ?></td>
                <td><?= h($votelocation->city_code) ?></td>
                <td><?= h($votelocation->state_code) ?></td>
                <td><?= h($votelocation->city_name) ?></td>
                <td><?= h($votelocation->state_name) ?></td>
                <td><?= $this->Number->format($votelocation->mesoregion_code) ?></td>
                <td><?= h($votelocation->mesoregion_name) ?></td>
                <td><?= h($votelocation->microregion_code) ?></td>
                <td><?= h($votelocation->microregion_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $votelocation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $votelocation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $votelocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $votelocation->id)]) ?>
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
