<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $rrule
 */

$this->extend('Cirici/AdminLTE./Common/form');

$this->Breadcrumbs
    ->add(__d('funayaki', 'Rrules'), ['action' => 'index']);

if ($this->request->param('action') == 'edit') {
    $this->Breadcrumbs->add(__d('funayaki', 'Edit'), $this->request->getRequestTarget());
}

if ($this->request->param('action') == 'add') {
    $this->Breadcrumbs->add(__d('funayaki', 'Add'), $this->request->getRequestTarget());
}

$this->assign('form-start', $this->Form->create($rrule, ['novalidate' => true]));

$this->start('form-content');
echo $this->Form->control('rrule');
$this->end();

$this->start('form-button');
echo $this->Form->button(__d('funayaki', 'Submit'));
$this->end();

$this->assign('form-end', $this->Form->end());
