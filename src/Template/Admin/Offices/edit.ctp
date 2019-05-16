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
$list[] = $this->Form->postLink(__('Delete'), [
    'action' => 'delete',
    $office->id
], [
    'confirm' => __('Are you sure you want to delete # {0}?', $office->id)
]);
$list[] = $this->Html->link(__('List Offices'), [
    'action' => 'index'
]);
$list[] = $this->Html->link(__('New Offices'), [
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
		<h3><?= __('Offices') ?></h3>
		
		
    	<?= $this->Flash->render() ?>
    	
    <?= $this->Form->create($office) ?>
    
    <fieldset>

			<legend><?= __('Edit Office') ?></legend>
        <?php
        echo $this->Form->control('name');
        echo $this->Form->control('code');
        echo $this->Form->control('email');
        echo $this->Form->control('deleted', [
            "options" => $this->Html->optionsYesNo()
        ]);
        echo $this->Form->control('rank');
        ?>
    
    </fieldset>
    
    <?=$this->html->tag("block", $this->Form->submit(__('Submit')), ["class" => "row my-5"]);?>
    <?= $this->Form->end() ?>
	</div>
</div>
