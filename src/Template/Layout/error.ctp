<?php
/**
 * @var App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?= $this->fetch('title') ?></title>
<?= $this->element("Layout/html_head") ?>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-primary">
		<a class="navbar-brand" href="#"><?= __('Error') ?></a>
	</nav>

	<div id="container">
        <?= $this->fetch('content') ?>
    </div>

	<div class="d-none">
    	<?= $this->Flash->render() ?>
	</div>

	<footer>
    	<?= $this->Html->link(__('Back'), 'javascript:history.back()') ?>
    </footer>
</body>
</html>
