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

<script>
$(function(){

<?php
$indexUrl = $this->Url->build([
    "action" => "index"
]);

echo 'var $index = "' . $indexUrl . '";'?>
$("#navbarsTop").find("a[href*='"+$index+"']").parents("li.nav-item").addClass("active");
	
});

</script>

</head>
<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-dark bg-primary">

			<a class="navbar-brand" href="#"><?= __($this->name) ?></a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsTop">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsTop">
			
			<?php

$list = [];
$list[] = $this->Html->link(__("HOME"), "/", [
    "class" => "nav-link"
]);

$list[] = $this->Html->link(__("USERS"), "/admin/users", [
    "class" => "nav-link"
]);
$list[] = $this->Html->link(__("OFFICES"), "/admin/offices", [
    "class" => "nav-link"
]);

echo $this->Html->nestedList($list, [
    "class" => "navbar-nav mr-auto"
], [
    "even" => "nav-item",
    "odd" => "nav-item"
]);
?>
				<form class="form-inline my-2 my-md-0">
					<!--  -->
				</form>
			</div>
		</nav>
	</header>

	<div id="container">
    	<?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>

	<footer>
		<!--  -->
	</footer>

</body>
</html>
