<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Office[] $offices
 */
?>
<div class="row my-5 mx-3">

	<nav class="col-lg-3 col-md-4 col-sm-12" id="actions-sidebar">

		<div class="card">
			<div class="card-header"><?= __('Actions') ?></div>
			
			<?php
$list = [];
$list[] = $this->Html->link(__('Edit User'), [
    'action' => 'edit',
    $user->id
]);
$list[] = $this->Form->postLink(__('Delete'), [
    'action' => 'delete',
    $user->id
], [
    'confirm' => __('Are you sure you want to delete # {0}?', $user->id)
]);
$list[] = $this->Html->link(__('List Users'), [
    'action' => 'index'
]);
$list[] = $this->Html->link(__('New User'), [
    'action' => 'add'
]);

echo $this->Html->nestedList($list, [
    "class" => "list-group list-group-flush"
], [
    "even" => "list-group-item",
    "odd" => "list-group-item"
]);
?>

		</div>
	</nav>

	<div class="col">
		<h3><?= __('Users') ?></h3>

    	<?= $this->Flash->render() ?>
    	
    	<fieldset>

			<legend><?= __('View User') ?></legend>

			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Username') ?></div>
				<div class="col">
					<div class="form-control">
					<?= h($user->username) ?>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Email') ?></div>
				<div class="col">
					<div class="form-control">
					<?= h($user->email) ?>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Password') ?></div>
				<div class="col">
					<div class="form-control bg-secondary">&nbsp;</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Deleted') ?></div>
				<div class="col">
					<div class="form-control">
					<?= $user->deleted ? __('Y') : __('N'); ?>
				</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Administrator') ?></div>
				<div class="col">
					<div class="form-control">
					<?= $user->administrator? __('Y') : __('N'); ?>
				</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Office') ?></div>
				<div class="col">
					<div class="form-control">
					<?= $user->has('office') ? $this->Html->link($user->office->name, ['controller' => 'Offices', 'action' => 'view', $user->office->id]) : '' ?>
				</div>
				</div>
			</div>

		</fieldset>
	</div>
</div>
