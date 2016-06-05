<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $votelocation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $votelocation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Votelocations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="votelocations form large-9 medium-8 columns content">
    <?= $this->Form->create($votelocation) ?>
    <fieldset>
        <legend><?= __('Edit Votelocation') ?></legend>
        <?php
            echo $this->Form->input('complete_city_code');
            echo $this->Form->input('city_code');
            echo $this->Form->input('state_code');
            echo $this->Form->input('city_name');
            echo $this->Form->input('state_name');
            echo $this->Form->input('mesoregion_code');
            echo $this->Form->input('mesoregion_name');
            echo $this->Form->input('microregion_code');
            echo $this->Form->input('microregion_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
