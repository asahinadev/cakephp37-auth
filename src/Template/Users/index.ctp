<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row my-5 mx-3">

	<nav class="col-lg-3 col-md-4 col-sm-12" id="actions-sidebar">
		<div class="card">
			<div class="card-header"><?= __('Actions') ?></div>
		</div>
	</nav>

	<div class="col">

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
					<?= $user->office?>
				</div>
				</div>
			</div>

		</fieldset>

	</div>
</div>