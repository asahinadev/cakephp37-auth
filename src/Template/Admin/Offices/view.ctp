<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Office $office
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
    $office->id
]);
$list[] = $this->Form->postLink(__('Delete'), [
    'action' => 'delete',
    $office->id
], [
    'confirm' => __('Are you sure you want to delete # {0}?', $office->id)
]);
$list[] = $this->Html->link(__('List Offices'), [
    'action' => 'index'
]);
$list[] = $this->Html->link(__('New Office'), [
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

		<fieldset>
			<legend><?= __('View Office') ?></legend>

			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Name') ?></div>
				<div class="col">
					<div class="form-control"><?= h($office->name) ?></div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Code') ?></div>
				<div class="col">
					<div class="form-control"><?= h($office->code) ?></div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Email') ?></div>
				<div class="col">
					<div class="form-control"><?= h($office->email) ?></div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Id') ?></div>
				<div class="col">
					<div class="form-control"><?= $this->Number->format($office->id) ?></div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Rank') ?></div>
				<div class="col">
					<div class="form-control"><?= $this->Number->format($office->rank) ?></div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Created') ?></div>
				<div class="col">
					<div class="form-control"><?= h($office->created) ?></div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Updated') ?></div>
				<div class="col">
					<div class="form-control"><?= h($office->updated) ?></div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2"><?= __('Deleted') ?></div>
				<div class="col">
					<div class="form-control"><?= $office->deleted ? __('Y') : __('N'); ?></div>
				</div>
			</div>
		</fieldset>
	</div>
</div>

<div class="my-5 mx-3">
<?php if (!empty($office->users)): ?>
<div class="related">
		<h4><?= __('Related Users') ?></h4>
		<table class="table table-bordered border-sm">

			<thead>
				<tr>
					<th class="d-table-cell           " scope="col"><?= $this->Paginator->sort('id') ?></th>
					<th class="d-table-cell           " scope="col"><?= $this->Paginator->sort('username') ?></th>
					<th class="d-none d-lg-table-cell " scope="col"><?= $this->Paginator->sort('email') ?></th>
					<th class="d-none                 " scope="col"><?= $this->Paginator->sort('password') ?></th>
					<th class="d-none                 " scope="col"><?= $this->Paginator->sort('deleted') ?></th>
					<th class="d-none                 " scope="col"><?= $this->Paginator->sort('administrator') ?></th>
					<th class="d-table-cell           " scope="col"><?= $this->Paginator->sort('office_id') ?></th>
					<th class="d-none d-lg-table-cell " scope="col"><?= $this->Paginator->sort('created') ?></th>
					<th class="d-table-cell           " scope="col"><?= $this->Paginator->sort('updated') ?></th>
					<th class="d-table-cell table-dark" scope="col"><?= __('Actions') ?></th>
				</tr>
			</thead>

			<tbody>
            <?php foreach ($office->users as $user): ?>
            <tr>
					<td class="d-table-cell          "><?= $this->Number->format($user->id) ?></td>
					<td class="d-table-cell          "><?= h($user->username) ?></td>
					<td class="d-none d-lg-table-cell"><?= h($user->email) ?></td>
					<td class="d-none                "><?= h($user->password) ?></td>
					<td class="d-none                "><?= $user->deleted ? "¡" : " " ?></td>
					<td class="d-none                "><?= $user->administrator? "¡" : " " ?></td>
					<td class="d-table-cell          "><?= $user->has('office') ? $this->Html->link($user->office->name, ['controller' => 'Offices', 'action' => 'view', $user->office->id]) : '' ?></td>
					<td class="d-none d-lg-table-cell"><?= $this->Time->format($user->created, "yyyy-MM-dd") ?></td>
					<td class="d-table-cell          "><?= $this->Time->format($user->updated, "yyyy-MM-dd") ?></td>
					<td class="d-table-cell dropdown ">
						<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"><?= __('Actions') ?></button>
			
			<?php
        $list = [];
        $list[] = $this->Html->link(__('View'), [
            'action' => 'view',
            $user->id
        ]);
        $list[] = $this->Html->link(__('Edit'), [
            'action' => 'edit',
            $user->id
        ]);
        $list[] = $this->Form->postLink(__('Delete'), [
            'action' => 'delete',
            $user->id
        ], [
            'confirm' => __('Are you sure you want to delete # {0}?', $user->id)
        ]);

        echo $this->Html->nestedList($list, [
            "class" => "dropdown-menu"
        ], [
            "even" => "dropdown-item",
            "odd" => "dropdown-item"
        ]);

        ?>
						
        	        </td>
				</tr>
            <?php endforeach; ?>
        </tbody>

		</table>
	</div>
<?php endif; ?>
</div>