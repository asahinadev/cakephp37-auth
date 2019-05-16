<?php
/**
 * @var array $params
 * @var string $class
 * @var string $message
 */
$class = 'alert alert-dismissible fade show';
if (! isset($params)) {
    $params = [];
}

if (! empty($params['class'])) {
    if (in_array($params['class'], [
        "primary",
        "secondary",
        "warning",
        "info",
        "light",
        "dark"
    ])) {
        $class .= ' alert-' . $params['class'];
    } else {
        $class .= ' alert-info' . $params['class'];
    }
} else {
    $class .= ' alert-info';
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