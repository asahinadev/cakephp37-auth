<?php
/**
 * @var mixed $content
 */
$content = explode("\n", $content);

foreach ($content as $line) :
    echo '<p> ' . $line . "</p>\n";
endforeach;
