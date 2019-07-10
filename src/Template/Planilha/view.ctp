<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Planilha $planilha
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Planilha'), ['action' => 'edit', $planilha->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Planilha'), ['action' => 'delete', $planilha->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planilha->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Planilha'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Planilha'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="planilha view large-9 medium-8 columns content">
    <h3><?= h($planilha->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($planilha->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($planilha->id) ?></td>
        </tr>
    </table>
</div>
