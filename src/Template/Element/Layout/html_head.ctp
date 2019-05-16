<?php
/**
 * @var App\View\AppView $this
 */
echo $this->fetch("meta");

echo $this->Html->css(
    [
        "/lib/bootstrap/4.1.3/css/bootstrap.min.css",
        "/lib/fontawesome/5.6.1/css/all.css",
        "/lib/datatables/datatables.min.css",
        "common"
    ]);
echo $this->fetch("css");

echo $this->Html->script(
    [
        "/lib/jquery/3.3.1/jquery.min.js",
        "/lib/poper.js/1.14.6/popper.min.js",
        "/lib/bootstrap/4.1.3/js/bootstrap.min.js",
        "/lib/datatables/datatables.min.js",
        "common"
    ]);
echo $this->fetch("script");
?>