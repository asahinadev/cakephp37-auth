<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User     $user
 * @var \App\Model\Entity\Office[] $offices
 */
?>
<div class="row my-5 mx-3">

	<nav class="col-lg-3 col-md-4 col-sm-12" id="actions-sidebar">

		<div class="card">
			<div class="card-header"><?= __('Actions') ?></div>
		</div>
	</nav>

	<div class="col">
		<h3><?= __('Users') ?></h3>
		
		
    	<?= $this->Flash->render() ?>
    	
    <?= $this->Form->create($user) ?>
    
    <fieldset>

			<legend><?= __('Add User') ?></legend>
        <?php
        echo $this->Form->control('username');
        echo $this->Form->control('password');
        ?>
    
    </fieldset>
    
    <?=$this->html->tag("block", $this->Form->submit(__('Login')), ["class" => "row my-5"]);?>
    <?= $this->Form->end() ?>
	</div>
</div>

