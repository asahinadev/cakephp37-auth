<?php
namespace App\View\Helper;

use Cake\View\Helper\HtmlHelper as Helper;


/**
 * Htmlm helper
 */
class HtmlHelper extends Helper {


    public function optionsYesNo($yes = "Y", $no = "N") {
        return [
            $yes,
            $no
        ];
    }


    public function dropDown($list) {
        return $this->Html->nestedList($list, [
            "class" => "dropdown-menu"
        ], [
            "even" => "dropdown-item",
            "odd" => "dropdown-item"
        ]);
    }
}
