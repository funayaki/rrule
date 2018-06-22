<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $rrules
 */

$this->extend('Cirici/AdminLTE./Common/index');

$this->Breadcrumbs
    ->add(__d('funayaki', 'Rrules'), $this->request->getRequestTarget());

$this->start('page-numbers');
echo $this->Paginator->numbers();
$this->end();

$this->append('header-actions');
echo $this->Html->link(__d('fuyayaki', 'New Rrule'),
    ['action' => 'add'],
    ['class' => 'btn btn-default pull-right']
);
$this->end();
?>

<?php $this->start('table-header'); ?>
<thead>
<tr>
    <th><?= $this->Paginator->sort('id') ?></th>
    <th><?= $this->Paginator->sort('rrule') ?></th>
    <th><?= __d('funayaki', 'Actions') ?></th>
</tr>
</thead>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
<tbody>
<?php foreach ($rrules as $rrule): ?>
    <tr>
        <td><?= $this->Number->format($rrule->id) ?></td>
        <td><?= h($rrule->rrule) ?></td>
        <td class="actions" style="white-space:nowrap">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rrule->id], ['class' => 'btn btn-default btn-xs']) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rrule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rrule->id), 'class' => 'btn btn-danger btn-xs']) ?>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
<?php $this->end(); ?>
