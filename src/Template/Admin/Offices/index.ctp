<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Office[]|\Cake\Collection\CollectionInterface $offices
 */
?>
<div class="row my-5 mx-3">

	<nav class="col-lg-3 col-md-4 col-sm-12" id="actions-sidebar">

		<div class="card">
			<div class="card-header"><?= __('Actions') ?></div>
			
			<?php
$list = [];
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
		<h3><?= __('Offices') ?></h3>
		
    	<?= $this->Flash->render() ?>
    	
		<?php if(count($offices)):?>
		
		<table class="table table-bordered border-sm">

			<thead>
				<tr>
					<th class="d-table-cell           " scope="col"><?= $this->Paginator->sort('id') ?></th>
					<th class="d-table-cell           " scope="col"><?= $this->Paginator->sort('name') ?></th>
					<th class="d-table-cell           " scope="col"><?= $this->Paginator->sort('code') ?></th>
					<th class="d-none d-lg-table-cell " scope="col"><?= $this->Paginator->sort('email') ?></th>
					<th class="d-none                 " scope="col"><?= $this->Paginator->sort('deleted') ?></th>
					<th class="d-table-cell           " scope="col"><?= $this->Paginator->sort('rank') ?></th>
					<th class="d-none d-lg-table-cell " scope="col"><?= $this->Paginator->sort('created') ?></th>
					<th class="d-table-cell           " scope="col"><?= $this->Paginator->sort('updated') ?></th>
					<th class="d-table-cell table-dark" scope="col"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody>
            <?php foreach ($offices as $office): ?>
            	<tr>
					<td class="d-table-cell           "><?= $this->Number->format($office->id) ?></td>
					<td class="d-table-cell           "><?= h($office->name) ?></td>
					<td class="d-table-cell           "><?= h($office->code) ?></td>
					<td class="d-none d-lg-table-cell "><?= h($office->email) ?></td>
					<td class="d-none                 "><?= h($office->deleted) ?></td>
					<td class="d-table-cell text-right"><?= $this->Number->format($office->rank) ?></td>
					<td class="d-none d-lg-table-cell "><?= $this->Time->format($office->created, "yyyy-MM-dd") ?></td>
					<td class="d-table-cell           "><?= $this->Time->format($office->updated, "yyyy-MM-dd") ?></td>
					<td class="d-table-cell dropdown  ">
						<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"><?= __('Actions') ?></button>
			
			<?php
        $list = [];
        $list[] = $this->Html->link(__('View'), [
            'action' => 'view',
            $office->id
        ]);
        $list[] = $this->Html->link(__('Edit'), [
            'action' => 'edit',
            $office->id
        ]);
        $list[] = $this->Form->postLink(__('Delete'), [
            'action' => 'delete',
            $office->id
        ], [
            'confirm' => __('Are you sure you want to delete # {0}?', $office->id)
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

		<nav aria-label="Page navigation example">
			<ul class="pagination">
            <?= $this->Paginator->first('<<' ) ?>
            <?= $this->Paginator->prev('<' ) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next( '>') ?>
            <?= $this->Paginator->last('>>') ?>
        	</ul>

			<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
		</nav>

		<?php endif;?>
	</div>
</div>