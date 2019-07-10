<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Planilha $planilha
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Planilha'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="planilha form large-9 medium-8 columns content">
    <?= $this->Form->create($planilha, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Adicionar planilha') ?></legend>
        <?php
            echo $this->Form->file('nome', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
