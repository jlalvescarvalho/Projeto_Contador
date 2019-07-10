<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Planilha $planilha
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $planilha->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $planilha->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Planilha'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="planilha form large-9 medium-8 columns content">
    <?= $this->Form->create($planilha) ?>
    <fieldset>
        <legend><?= __('Edit Planilha') ?></legend>
        <?php
            echo $this->Form->control('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
