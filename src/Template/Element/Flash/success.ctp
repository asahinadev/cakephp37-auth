<?php
/**
 * @var array $params
 * @var string $class
 * @var string $message
 */
$class = 'alert alert-success alert-dismissible fade show';
if (! isset($params)) {
    $params = [];
}
if (! isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="<?= h($class) ?>" role="alert">
	<?= $message ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>