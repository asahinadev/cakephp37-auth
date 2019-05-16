<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

/**
 * @var mixed $content
 * @var mixed $message
 * @var mixed $url
 * @var App\View\AppView $this
 * @var \Exception $error
 */
$this->layout = 'error';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
    ?>
<?php if (!empty($error->queryString)) : ?>
<p class="notice">
	<strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
<strong>SQL Query Params: </strong>
<?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
    if (extension_loaded('xdebug')) :
        xdebug_print_function_stack();
endif;

    $this->end();
endif;

?>
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4"><?= h($message) ?></h1>
		<p class="lead">
			<strong><?= __d('cake', 'Error') ?>: </strong><br>
			<?= __d('cake', 'The requested address {0} was not found on this server.', "<strong>'{$url}'</strong>") ?>
		</p>
	</div>
</div>
